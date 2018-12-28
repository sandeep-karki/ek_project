<?php

namespace App\Http\Controllers\Admin\apiusers;


use App\ApiUser;
use App\Http\Requests\system\ApiUsersRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiUsersController extends Controller
{

    /**
     * ApiUsersController constructor.
     * @param ApiUser $apiUser
     */
    public function __construct( ApiUser $apiUser)
    {
        $this->pageTitle = "Api Users";
        $this->model = $apiUser;
        $this->redirectUrl = PREFIX."/apiusers";
    }

    /**
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ApiUsersRequest $request)
    {
        $title = $this->pageTitle;
        $data = $this->model->getAllData($request->all());
        return view('system.api-users.index',compact('title','data'));
    }


}
