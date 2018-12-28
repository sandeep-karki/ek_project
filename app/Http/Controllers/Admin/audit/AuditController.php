<?php

namespace App\Http\Controllers\Admin\audit;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerBoilerPlate\ControllerInterface;
use App\Permission;
use App\Role;
use App\Services\PermissionService;
use App\Services\system\AuditService;
use App\User;
use Auth;
use Flash;
use Illuminate\Http\Request;
use Input;
use OwenIt\Auditing\Models\Audit;

class AuditController extends Controller implements ControllerInterface
{
    /**
     * @var AuditService
     */
    private $auditService, $redirectUrl, $modelArray;

    /**
     * AuditController constructor.
     * @param AuditService $auditService
     */
    public function __construct(AuditService $auditService)
    {
//        $this->middleware('checkPermission:audit,audit');
        $this->modelArray = [Audit::class => "all", User::class => "User", Role::class => "Role"];
        $this->auditService = $auditService;
        $this->redirectUrl = PREFIX . '/audit';
        $this->permissionService = new PermissionService();

    }


    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = $this->permissionService->modelPermission('audit', 'audit');
            $pageTitle = "Audit Log";
            $model = $this->modelArray;
            if (is_null(Input::get('module')) || Input::get('module') === Audit::class) {
                $audits = $this->auditService->getNormalAudits();
            } else {
                $class = Input::get('module');
                $instance = new $class();
                $audits = $this->auditService->getModelAudits($instance);
            }
            return view('system.audit.index', compact('pageTitle', 'model', 'audits','data'));
        } catch (\Throwable $ex) {
            return redirect($this->redirectUrl)->withErrors("Module not found");

        }

    }

    /**
     * Show the form for creating a new resource.
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @param  int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int $id
     * @return void
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}
