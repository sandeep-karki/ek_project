<?php

namespace App\Http\Controllers\Admin\users;

use App\Helper\Ekcms\EkHelper;
use App\Http\Requests\system\UsersRequest;
use App\Mail\SendMailonCreateUser;
use App\Role;
use App\RoleUser;
use App\Services\PermissionService;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Validator;
use GuzzleHttp;

class usersController extends Controller
{
    private $pageTitle;
    private $model;
    private $permisionModel;
    private $redirectUrl;

    /**
     * usersController constructor.
     * @param User       $users
     * @param Permission $permisionModel
     */
    public function __construct(User $users)
    {
        $this->pageTitle = "Users";
        $this->model = $users;
        $this->permissionService = new PermissionService();

        $this->redirectUrl = PREFIX."/user";
    }

    /**
     * @param UsersRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(UsersRequest $request)
    {

        $data = $this->permissionService->modelPermission('user', 'user');
        $title = $this->pageTitle;
        $users = $this->model->getAllData($request->all());
        $superUserCount = count(RoleUser::where('role_id',1)->get());
        return view('system.users.index',compact('data','title','roles','superUserCount','users'));
    }

    /**
     * @param UsersRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(UsersRequest $request)
    {

        $title = $this->pageTitle;

        $roles = [""=>'Please Select'] + Role::pluck('name','id')->all();

        return view('system.users.create',compact('roles','permission','timezoneData','title'));
    }


    /**
     * @param UsersRequest $request
     * @return $this
     */
    public function store(UsersRequest $request)
    {

        $ip=$request->ip();
//        $apiIpResponse="http://ip-api.com/json/".$ip;
        $client = new GuzzleHttp\Client(['base_uri' => 'http://ip-api.com']);
//        $res = $client->request('GET', '/json/'.$ip);
        $res = $client->request('GET', '/json/'.$ip);
        $ipResponse=json_decode($res->getBody());
//        echo $res->getStatusCode();
        if($ipResponse->status=='fail'){
            $ipResponse='';
//            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Invalid IP address!']);
        }

        try {
            $rolesData = Role::where('id',$request->roles)->first();
            if(!$rolesData){
                return redirect()->back()->withErrors(['Internal Sever Error']);
            }
            if (!empty($request->image)) {
                $image = $request->file('image');
                $extension = array( 'jpeg','jpg','png','gif','svg');
                if (!in_array($image->getClientOriginalExtension(),$extension)) {
                    return redirect()->back()->withErrors(['alert-danger'=>'The icon must be a file of type: jpeg, png, jpg, gif,svg.']);
                }
                $imageName = EkHelper::uploadImage($request->image, "/uploads/users", 100, 100);
                $insertedData['image'] = $imageName;


            }
            $insertedData['first_name']     = $request->first_name;
            $insertedData['last_name']      = $request->last_name;
            $insertedData['username']       = $request->username;
            $insertedData['email']          = $request->email;
            $insertedData['status']         = $request->status;
            $insertedData['password']       = $request->password;
            $insertedData['created_at']     = Carbon::now();
            $insertedData['city']           = !empty($ipResponse) ? $ipResponse->city : 'Kathmandu';
            $insertedData['country']        = !empty($ipResponse) ? $ipResponse->country : 'Nepal';
            $insertedData['ip']             = !empty($ipResponse) ? $ipResponse->query : '110.44.123.47';
            try{
                $usersData = $this->model->create($insertedData);

                $reset_token = Password::getRepository()->create($usersData);
                if($request->set_password_status == 0){
                    Mail::to($usersData->email)->send(new SendMailonCreateUser($usersData,$reset_token));
                }
                $roleData['user_id'] = $usersData->id;
                $roleData['role_id'] = $rolesData->id;
                RoleUser::create($roleData);
                return redirect($this->redirectUrl)->withErrors(['alert-success'=>'Successfully added!']);
            }
            catch (Exception $e) {
                return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Data was not saved!']);
            }

        } catch (Exception $e) {
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Data was not saved!']);
        }
    }


    /**
     * @param UsersRequest $request
     * @param              $id
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(UsersRequest $request,$id)
    {
        if(!is_numeric($id)){
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Invalid character used in URL!']);
        }
        $title = $this->pageTitle;
        $data = $this->model->find($id);
        $superUserCount = count(RoleUser::where('role_id',1)->get());
        if(empty($data)){
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Data was not found!']);
        }
        $roles = [""=>'Please Select'] + Role::pluck('name','id')->all();

        return view('system.users.edit', compact('data','title','roles','permission','superUserCount','timezoneData'));
    }


    /**
     * @param UsersRequest $request
     * @param              $id
     * @return $this
     */
    public function update_old(UsersRequest $request,$id)
    {
        if(!is_numeric($id)){
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Invalid character used in URL!']);
        }

        $usersData = $this->model->find($request->id);
        // $attributes            = $request->all();
        $rolesData = Role::where('id',$request->roles)->first();
        if(empty($rolesData) || empty($usersData)){
            return redirect()->back()->withErrors(['alert-danger'=>'Data was not found!']);
        }
        $insertedData['first_name'] = $request->first_name;
        $insertedData['last_name'] = $request->last_name;
        $insertedData['username'] = $request->username;
        $insertedData['email'] = $request->email;
        if($request->status == 0)
        {
            $insertedData['status'] = false;
        }elseif($request->status == 1)
        {
            $insertedData['status'] = true;
        }else{
            $insertedData['status'] = $request->status;
        }

        $insertedData['updated_at'] = Carbon::now();
        $insertedData['updated_by'] = Auth::guard('web')->user()->id;
        try {
            $usersData->update($insertedData);
            if($request->roles == 1){
                if($usersData->rolesUser !== null)
                {
                    if($usersData->rolesUser->role_id !== 1)
                    {
                        RoleUser::where('user_id',$usersData->id)->delete();
                        $roleData['user_id'] = $usersData->id;
                        $roleData['role_id'] = $rolesData->id;
                        RoleUser::create($roleData);
                    }

                }

            }else{
                $superUserCount = count(RoleUser::where('role_id',1)->get());
                if($superUserCount < 1)
                {
                    return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Sorry role cannot be changed because there is only one super admin in our syustem!']);
                }
                RoleUser::where('user_id',$usersData->id)->delete();
                $roleData['user_id'] = $usersData->id;
                $roleData['role_id'] = $rolesData->id;
                RoleUser::create($roleData);
            }
            return redirect($this->redirectUrl)->withErrors(['alert-success'=>'Successfully updated!']);
        } catch (\Exception $e) {
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Data was not saved!']);
        }

    }

    public function update(UsersRequest $request,$id)
    {
        if(!is_numeric($id)){
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Invalid character used in URL!']);
        }

        $usersData = $this->model->find($request->id);
        // $attributes            = $request->all();
        $rolesData = Role::where('id',$request->roles)->first();
        if(empty($rolesData) || empty($usersData)){
            return redirect()->back()->withErrors(['alert-danger'=>'Data was not found!']);
        }
        if (!empty($request->image)) {
            $image = $request->file('image');
            $extension = array( 'jpeg','jpg','png','gif','svg');
            if (!in_array($image->getClientOriginalExtension(),$extension)) {
                return redirect()->back()->withErrors(['alert-danger'=>'The icon must be a file of type: jpeg, png, jpg, gif, svg.']);
            }
            if ($usersData->image != null && file_exists(public_path().'/uploads/users/'.$usersData->image)) {
                \File::delete(public_path().'/uploads/users/'.$usersData->image);
            }
            $imageName =EkHelper::uploadImage($request->image, "/uploads/users", 100, 100);
            $insertedData['image'] = $imageName;

        }
        $insertedData['first_name'] = $request->first_name;
        $insertedData['last_name'] = $request->last_name;
        $insertedData['username'] = $request->username;
        $insertedData['email'] = $request->email;
        if($request->status == 0)
        {
            $insertedData['status'] = false;
        }elseif($request->status == 1)
        {
            $insertedData['status'] = true;
        }else{
            $insertedData['status'] = $request->status;
        }

        $insertedData['updated_at'] = Carbon::now();
        $insertedData['updated_by'] = Auth::user()->id;
        try {
            //$attributes = Input::except('_token');
            $usersData->update($insertedData);


            if($request->roles == 1){
//                $superUserCount = count(RoleUser::where('role_id',1)->get());
//                if($request->roles !== 1)
//                {
//                    if($superUserCount >= 1){
                if($usersData->rolesUser !== null)
                {
                    if($usersData->rolesUser->role_id !== 1)
                    {
                        RoleUser::where('user_id',$usersData->id)->delete();
                        $roleData['user_id'] = $usersData->id;
                        $roleData['role_id'] = $rolesData->id;
                        RoleUser::create($roleData);
                    }

                }

//                    }
//                }

            }else{
                $superUserCount = count(RoleUser::where('role_id',1)->get());
                if($superUserCount < 1)
                {
                    return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Sorry role cannot be changed because there is only one super admin in our syustem!']);
                }
                RoleUser::where('user_id',$usersData->id)->delete();
                $roleData['user_id'] = $usersData->id;
                $roleData['role_id'] = $rolesData->id;
                RoleUser::create($roleData);
            }

            return redirect($this->redirectUrl)->withErrors(['alert-success'=>'Successfully updated!']);
        } catch (Exception $e) {
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Data was not saved!']);
        }

    }


    /**
     * @param UsersRequest $request
     * @param              $id
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function password(UsersRequest $request,$id)
    {
        if(!is_numeric($id)){
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Invalid character used in URL!']);
        }
        //$id                   = $request->id;
        $data = $this->model->where('id',$id)->first();

        if(empty($data)){
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Data was not found!']);
        }
        return view('system.users.changepass', compact('data'));
    }


    /**
     * @param UsersRequest $request
     * @return $this
     */
    public function updatepassword(UsersRequest $request){

        if(!is_numeric(Input::get('id'))){
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Invalid character used in URL!']);
        }
        $id                   = $request->id;
        $data = $this->model->find($id);
        if(empty($data)){
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Data was not found!']);
        }
        $data->update(['password'=>$request->password]);
        return redirect($this->redirectUrl)->withErrors(['alert-success'=>'Successfully updated!']);
    }


    /**
     * @param UsersRequest $request
     * @param              $id
     * @return $this
     */
    public function destroy(UsersRequest $request,$id)
    {

        if(!is_numeric($id)){
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Invalid character used in URL!']);
        }
        $users = $this->model->find(Input::get("id"));
        if(empty($users)){
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Data was not found!']);
        }
        if($this->model->count() == 1){
            return redirect()->back()->withErrors(['Deletion unsuccessful because there must be at least one admin!']);
        }
        try {
            $users = $this->model->find($id);
            $t = $users->delete();
            RoleUser::where('user_id',$users->id)->delete();
            return redirect()->back()->withErrors(['alert-success'=>'Successfully deleted!']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['alert-danger'=>$e->getMessage()]);
        }

    }
}
