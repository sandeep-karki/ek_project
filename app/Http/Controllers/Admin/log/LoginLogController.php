<?php

namespace App\Http\Controllers\Admin\log;

use App\LoginLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\PermissionService;
use App\Http\Requests;
use Auth;
use Input;
use App\User;

class LoginLogController extends Controller
{
    public function __construct(LoginLog $loginLog, User $user)
    {
        $this->pageTitle = "Login Logs";
        $this->model = $loginLog;
        $this->users = $user;
        $this->redirectUrl = PREFIX."/login_logs";
        $this->permissionService = new PermissionService();
    }


    /**
     * @param LogRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
//        $permissions = $this->permissionService->modelPermission('loginLog', 'loginLog');
        $pageTitle = $this->pageTitle;
        $users=$this->users->all();
        $data = $this->model->getAllData(Input::all());
        return view('system.loginLog.index',compact('data','pageTitle','permissions','users'));
    }


}
