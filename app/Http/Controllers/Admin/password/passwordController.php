<?php

namespace App\Http\Controllers\Admin\password;

use App\Http\Requests\system\ChangePasswordRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class passwordController extends Controller
{
    //

    public function __construct(User $user)
    {
        $this->redirectUrl = PREFIX."/home";
        $this->user = $user;
    }

    public function changePassword(ChangePasswordRequest $request,$id){
        if(!is_numeric($id)){
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Invalid character used in URL!']);
        }
        $user = $this->user->where('id',$id)->first();
        if(empty($user)){
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'No user found!']);
        }
        return view('system.password.changepassword', compact('user'));

    }

    public function updatePassword(ChangePasswordRequest $request,$id){


        if(!is_numeric($id)){
            return redirect()->back()->withErrors(['alert-danger'=>'Invalid character used in URL!']);
        }
        $data = $this->user->where('id',$id);
        if(empty($data)){
            return redirect()->back()->withErrors(['alert-danger'=>'Data was not found!']);
        }
        $insertedData['password'] = bcrypt($request->password);
        $insertedData['updated_at'] = Carbon::now();
        $data->update($insertedData);
        return redirect($this->redirectUrl)->withErrors(['alert-success'=>'Your Password is successfully updated']);
    }
}
