<?php

namespace App\Http\Controllers\Admin\home;


use App\Prizes;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use File;

class homeController extends Controller
{
    //

    public function __construct(User $user)
    {
        $this->pageTitle = "Dashboard";
        $this->user      =  $user;

    }

    public function index(){
        $data['title']                  = $this->pageTitle;
        $data['active_user']             = $this->user->countUser(1);
        $data['inactive_user']             = $this->user->countUser(0);
        $data['total_user']             = $this->user->countUser(null);
        return view('system.home.home',$data);
    }



}
