<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\LoginLog;
use App\CustomSetting;
use App\SecuritySetting;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use GuzzleHttp;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use App\User;
use App\Helper\Ekcms\EkHelper;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailOnVerification;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Carbon\Carbon;
use DB;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    protected $guard='web';


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'system/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }

    public function showLoginForm(Request $request)
    {
        if(Auth::check()){
            return redirect(PREFIX.'/home');
        }
        $currentIp=$request->ip();
        $data['color']=DB::table('custom_settings')->where('label','Cms Theme Color')->first()->value;
        $data['cmslogo']=DB::table('custom_settings')->where('label','Cms Logo')->first()->value;
        $data['cmstitle']=DB::table('custom_settings')->where('label','Cms Title')->first()->value;
        return view('auth.login',compact('currentIp','data'));
    }

    public function verify(Request $request) {
        if(empty($request->token)) {
            redirect(PREFIX.'/login');
        }
        try {
            $userData = decrypt($request->token);
            $user=User::where('username',$userData->username)->first();
            if(empty($user)) {
                return redirect(PREFIX . '/login');
            }
            $data['color']=DB::table('custom_settings')->where('label','Cms Theme Color')->first()->value;
            $data['cmslogo']=DB::table('custom_settings')->where('label','Cms Logo')->first()->value;
            $data['cmstitle']=DB::table('custom_settings')->where('label','Cms Title')->first()->value;
            return view('auth.verification')->with(['token'=>$request->token,'data'=>$data]);
        } catch (DecryptException $e) {
            redirect(PREFIX.'/login');
        }
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        $user=User::where('username',$request->username)->first();
        if(!empty($user)) {
            if (!Hash::check($request->password, $user->password)) {
                return redirect(PREFIX . '/login')->withErrors(['alert-danger' => 'Incorrect Username/Password']);
            }
        }else{
            return redirect(PREFIX . '/login')->withErrors(['alert-danger' => 'Incorrect Username/Password']);
        }
        $ipResponse=$this->logUserDetails($user,$request->ip());

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if($user->security==1){
                $data['user_id'] = $this->guard()->user()->id;
                $data['module'] = 'login';
                $data['data'] = "User " . $this->guard()->user()->username . " Logged in at " . date('Y-m-d h:i:s');
                $this->getCustomSession();
                return redirect(PREFIX.'/home');
            }else{
                $securitySelected=SecuritySetting::where('id',$user->security)->first()->target;
                if($user->{$securitySelected} == $ipResponse->{$securitySelected}){
                    $this->getCustomSession();
                    return redirect(PREFIX.'/home');
                }else{
                    $encrypted = encrypt($user);
                    $ekhelper=new EkHelper();
//                    $reset_token = $ekhelper->randomPassword(6);
                    $reset_token=mt_rand(100000, 999999);
                    $user->verification_code=$reset_token;
                    $user->save();
                    Mail::to($user->email)->send(new SendMailOnVerification($user,$reset_token));
                    $this->guard()->logout();
                    return redirect(PREFIX.'/verify?token='.$encrypted);
                }
            }
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function getCustomSession(){
        Session::put('color',CustomSetting::where('label','Cms Theme Color')->first()->value);
        Session::put('cmslogo',CustomSetting::where('label','Cms Logo')->first()->value);
        Session::put('cmstitle',CustomSetting::where('label','Cms Title')->first()->value);
    }

    public function verification(Request $request){
        if(empty($request->token)) {
            redirect(PREFIX.'/login');
        }

        try {
            $userData = decrypt($request->token);
            $now=Carbon::now();
            $updated=$now->subHour();
            $user=User::where('id',$userData->id)->where('verification_code',$request->verification_code)->where('updated_at','>=',$updated)->first();
            if(empty($user)){
                return redirect(PREFIX.'/login')->withErrors(['alert-danger'=>'Sorry the verification code has expired!']);
            }
            $lastLog=LoginLog::where('user_id',$user->id)->orderBy('id','desc')->first();
            $user->ip=$lastLog->ip;
            $user->city=$lastLog->city;
            $user->country=$lastLog->country;
            $user->verification_code='';
            $user->save();
            Auth::guard()->loginUsingId($user->id, true);
            $this->getCustomSession();
            return redirect(PREFIX.'/home');
        } catch (DecryptException $e) {
            return redirect(PREFIX.'/login')->withErrors(['alert-danger'=>'Invalid attempt']);
        }

    }


    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */

    protected function logUserDetails($user,$ip){
        $client = new GuzzleHttp\Client(['base_uri' => 'http://ip-api.com']);
        $res = $client->request('GET', '/json/'.$ip);
        $ipResponse=json_decode($res->getBody());
        if($ipResponse->status=='fail'){
            $ipResponse='';
        }
            $loginLog=$this->createLoginLogs($user,$ipResponse);
            return $loginLog;
    }
    protected function createLoginLogs($user, $ipResponse){
        return LoginLog::create([
            'user_id'=>$user->id,
           'ip'=> !empty($ipResponse)?$ipResponse->query:'110.44.123.47',
            'city'=> !empty($ipResponse)?$ipResponse->city:'Kathmandu',
            'country'=> !empty($ipResponse)?$ipResponse->country:'Nepal',
            'isp'=> !empty($ipResponse)?$ipResponse->isp:'Vianet Communications Pvt.',
            'lat'=> !empty($ipResponse)?$ipResponse->lat:'27.7167',
            'lon'=>!empty($ipResponse)?$ipResponse->lon:'85.3167',
            'timezone'=>!empty($ipResponse)?$ipResponse->timezone:'Asia/Kathmandu',
            'region_name'=>!empty($ipResponse)?$ipResponse->regionName:'Central Region',
        ]);

    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required', 'password' => 'required',
        ]);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->has('remember')
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        //dd($this->guard()->user());
//        $request->session()->regenerate();

//        $this->clearLoginAttempts($request);

        return redirect(PREFIX.'/home');

//        return $this->authenticated($request, $this->guard()->user())
//            ?: redirect()->intended($this->redirectPath());
    }
    //
    //  protected function defaultLanguage()
    // {
    //     $language = Language::where('default','yes')->first();

    //     return \Session::put('default_language', $language->slug);
    // }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {

    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => Lang::get('auth.failed'),
            ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

//        $request->session()->flush();
//
//        $request->session()->regenerate();

        return redirect('/system/login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard($this->guard);
    }




}
