<?php
namespace App\Http\Controllers\frontend\resetpassword;

use App\Catalog;
use App\Http\Requests\UsersRequest;
use App\Mail\SendMailonCreateUser;
use App\Mail\SendMailonForgetpassword;
use App\RetailOutlet;
use App\Skuinventory;
use App\SmsMessages;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Permission;
use Auth;
use App\User;
use DB;
use EkHelper;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Mockery\Exception;
use Validator;
use App\CustomSetting;

class recoverpasswordController extends Controller
{

    use ResetsPasswords;
    private $thisPageId = 'Reset Password';

    private $thisModuleId = "home";


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function __construct(User $user)
    {
        $this->model = $user;
        $this->redirectUrl = PREFIX."/";
    }

    public function index() {
        $data['color']=DB::table('custom_settings')->where('label','Cms Theme Color')->first()->value;
        $data['cmslogo']=DB::table('custom_settings')->where('label','Cms Logo')->first()->value;
        $data['cmstitle']=DB::table('custom_settings')->where('label','Cms Title')->first()->value;
        return view("frontend.reset-password.recover-password",compact('data'));
    }


    public function recoverpassword(Request $request){
        $data =  $request->all();
        $rules =[

            'email' => 'required',

        ];
        $message = [
            'email.required' =>'Email is required.',
        ];

        $validator = Validator::make($data, $rules,$message);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput($request->old());
        }

        try{
            $usersData = $this->model->findbyEmail($request->email);
            if($usersData == null){
                return redirect()->back()->withErrors(['alert-danger'=>'We couldn\'t find your account in our system.'])->withInput($request->old());
            }

            $reset_token = Password::getRepository()->create($usersData);

            Mail::to($usersData->email)->send(new SendMailonForgetpassword($usersData,$reset_token));
            return redirect('/system/login')->withErrors(['alert-success'=>'Email send Successfully.']);

        }catch (Exception $exception){

        }

    }



    public function resetUserPassword(Request $request){

        return  $this->reset($request);
    }

    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ];
    }
    public function reset(Request $request)
    {
        $this->validate($request, $this->rules(), $this->validationErrorMessages());

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {

            $this->resetPassword($user, $password);
        }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        return $response == Password::PASSWORD_RESET
            ? $this->sendResetResponse($response)
            : $this->sendResetFailedResponse($request, $response);
    }

    protected function resetPassword($user, $password)
    {
        $user->forceFill([
            'password' => $password,
            'remember_token' => Str::random(60),
        ])->save();

            $this->guard()->logout();


    }

    protected function sendResetResponse($response)
    {
//        return redirect($this->redirectPath())
//            ->with('status', trans($response));

        return redirect(url('/system/login'));
    }

    protected function validationErrorMessages()
    {
        return [];
    }



    /**
     * @return array
     */



}
