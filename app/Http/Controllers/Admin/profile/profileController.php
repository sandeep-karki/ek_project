<?php

namespace App\Http\Controllers\Admin\profile;

use App\SecuritySetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class profileController extends Controller
{
    private $redirectUrl;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(User $users)
    {
        $this->redirectUrl = PREFIX."/profile";
    }

    public function index()
    {
        $pageTitle = 'Profile';
        $securitySettings=SecuritySetting::get();
        $user=Auth::user();
        return view('system.profile.index',compact('securitySettings','user','pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->user_id != Auth::user()->id){
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Unauthorized action.']);
        }
        $validate=$this->validateSecurity($request);

        $user= User::where('id',Auth::user()->id)->first();
        $user->security=$request->securityOption;
        $user->save();
        return redirect($this->redirectUrl)->withErrors(['alert-success'=>'Security Setting changed successfully.']);
    }

    private function validateSecurity($request){

        return $this->validate($request, [
            'securityOption' => 'required|integer|exists:security_settings,id',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        abort('404');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort('404');
    }

    public function globalSetting(Request $request){
        if($request->user_id!=1){
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Invalid Attempt.']);
        }
        $users=User::get();
        if($request->globalSecurityOption==0){
            foreach($users as $u){
                $u->global_setting='false';
                $u->save();
            }
        }else{
            foreach($users as $u){
                $u->global_setting='true';
                $u->security = $request->globalSecurityOption;
                $u->save();
            }
        }
        return redirect($this->redirectUrl)->withErrors(['alert-success'=>'The user security setting has been changed!']);

    }
}
