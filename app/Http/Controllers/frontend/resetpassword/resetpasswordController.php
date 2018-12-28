<?php
namespace App\Http\Controllers\frontend\resetpassword;

use App\Catalog;
use App\Http\Requests\UsersRequest;
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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class resetpasswordController extends Controller
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

    public function index($token,$userid) {

        $email =$this->model->findById($userid)->email;
        $username =$this->model->findById($userid)->username;
        $resetRecord = DB::table('password_resets')->where('email',$email)->first();

        if ($resetRecord!= null && Hash::check($token, $resetRecord->token)) {
            return view("frontend.reset-password.reset",compact('pageTitle','userid','token','email','username'));

        }
        return redirect()->to('/system')->withErrors(['alert-danger'=>'The token is invalid!']);


    }

    public function resetUserPassword(Request $request){

        return  $this->reset($request);
    }

    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6|password',
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

        return redirect(url('/system/login'))->withErrors(['alert-success'=>'Password successfuly reset.']);
    }

    protected function validationErrorMessages()
    {
        return [
            'password.password' =>'The password must contain at least one uppercase, one lowercase, one number and one special character'
        ];
    }



    /**
     * @return array
     */



}
