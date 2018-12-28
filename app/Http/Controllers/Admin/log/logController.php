<?php

namespace App\Http\Controllers\Admin\log;

use App\Services\PermissionService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Auth;
use Input;
use App\Log;
use App\Http\Requests\LogRequest;
class logController extends Controller
{
    /**
     * logController constructor.
     * @param Log $log
     */
    public function __construct(Log $log)
    {
        $this->pageTitle = "Log Management";
        $this->model = $log;
        $this->redirectUrl = PREFIX."/log";
        $this->permissionService = new PermissionService();
    }


    /**
     * @param LogRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(LogRequest $request)
    {
        $permissions = $this->permissionService->modelPermission('log', 'log');
        $pageTitle = $this->pageTitle;
        $data = $this->model->getAllData(Input::all());
        return view('system.log.index',compact('data','pageTitle','permissions'));
    }


    /**
     * @param LogRequest $request
     * @param            $id
     * @return $this
     */
    public function destroy(LogRequest $request,$id){
        try {
            $logData = $this->model->find($id);
            $t = $logData->delete();
            return redirect()->back()->withErrors(['alert-success'=>'Successfully deleted!']);
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['alert-danger'=>$e->getMessage()]);
        }
    }


}
