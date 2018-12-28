<?php

namespace App\Http\Controllers\Admin\users;

use App\Http\Requests\system\RolesRequest;
use App\Services\PermissionService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Support\Facades\Auth;
use App\RoleUser;

class rolesController extends Controller
{
    //
    private $pageTitle;
    private $model;
    private $redirectUrl;

    /**
     * rolesController constructor.
     * @param Role       $roles
     * @param Permission $permission
     */
    public function __construct(Role $roles)
    {

        $this->pageTitle = "User Roles";
        $this->model = $roles;
        $this->redirectUrl = PREFIX."/role";
        $this->permissionService = new PermissionService();
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(RolesRequest $request)
    {
        $title = $this->pageTitle;
        $permissions = $this->permissionService->modelPermission('user', 'role');
        // if(null !== Auth::guard('web')->user()->rolesUser && Auth::guard('web')->user()->rolesUser->role_id == 1){
        //     $permission = new Permission;
        //     $permission->refreshPermission();
        // }
        $title = $this->pageTitle;
        $data = $this->model->getAllData($request->all());
        return view('system.roles.index',compact('data','title','permissions'));
    }


    /**
     * @param RolesRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(RolesRequest $request)
    {
        $title = $this->pageTitle;
        $permission = $this->permissionService->groupedPermissions();
        return view('system.roles.create',compact('permission','title'));
    }


    /**
     * @param RolesRequest $request
     * @param              $id
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(RolesRequest $request,$id){
        $title =$this->pageTitle;
        $data = $this->model->find($id);
        if(empty($data)){
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Data was not found!']);
        }
        if($data->name=='superuser'){
            return redirect()->back()->withErrors(['You cannot delete superuser!']);
        }
        $userPermission = $this->model->getUserRoles($id);
        $permission = $this->permissionService->groupedPermissions();
        return view('system.roles.edit',compact('permission','userPermission','data','title'));
    }


    /**
     * @param RolesRequest $request
     * @return $this
     */
    public function store(RolesRequest $request)
    {
        try {
            $attributes            = $request->all();
            $module = '{"home.view":"1",';
            if(!empty($request->permissions)){
                foreach($request->permissions as $p){
                    $module .= '"'.$p.'"'.':'.'"1"'.',';
                }
            }
            $moduleData = rtrim($module, ',')."}";
            $attributes['permissions'] = $moduleData;
            $this->model->create($attributes);
            return redirect($this->redirectUrl)->withErrors(['alert-success'=>'Successfully added!']);
        } catch (\Exception $e) {
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Data was not saved!']);
        }
    }


    /**
     * @param RolesRequest $request
     * @param              $id
     * @return $this
     */
    public function update(RolesRequest $request,$id)
    {
        $rolesData = $this->model->find($id);
        try {
            $attributes            = $request->all();
            $module = '{"home.home.view":"1",';
            if(!empty($request->permissions))
            {
                foreach($request->permissions as $p){
                    $module .= '"'.$p.'"'.':'.'"1"'.',';
                }
            }

            $moduleData = rtrim($module, ',')."}";
            $attributes['permissions'] = $moduleData;
            $rolesData->update($attributes);
            return redirect($this->redirectUrl)->withErrors(['alert-success'=>'Successfully updated!']);
        } catch (\Exception $e) {
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Data was not saved!']);
        }
    }


    /**
     * @param RolesRequest $request
     * @param              $id
     * @return $this
     */
    public function destroy(RolesRequest $request,$id)
    {
        $check = RoleUser::where('role_id',$id)->get();
        if(count($check) > 0)
        {
            return redirect()->back()->withErrors(['alert-error'=>'This role cannot be deleted because it is associated with users!']);
        }
        $roles = $this->model->find($id);
        try {
            if($roles->name=='superuser'){
                return redirect()->back()->withErrors(['You cannot delete superuser!']);
            }
            $name = $roles->name;
            $t = $roles->delete();
            return redirect()->back()->withErrors(['alert-success'=>'Successfully deleted!']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }

    }
}
