<?php

namespace App\Http\Controllers\Admin\templates;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class listController extends Controller
{
  public function __construct()
  {
      $this->pageTitle = "Templates List";
  }

  public function index()
  {
      $pageTitle = $this->pageTitle;
      return view('system.templates.list-view',compact('pageTitle'));
  }

  public function show(){
    abort(404);
  }
}
