<?php
namespace App\Http\Controllers\Admin\config;


use App\EmailTemplate;
use App\Http\Requests\EmailTemplateRequest;
use App\Services\PermissionService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class emailController extends Controller
{

    private $title;
    private $pageTitle;
    private $model;
    private $viewPath;
    private $redirectUrl;

    public function __construct(EmailTemplate $template)
    {
//        $this->middleware('checkPermission:config,email');
        $this->title = 'Email Template';
        $this->pageTitle = 'Email Template';
        $this->model = $template;
        $this->viewPath  = 'system.email.';
        $this->redirectUrl = PREFIX."/email";
        $this->permissionService = new PermissionService();

    }


    public function index(Request $request){
        $data = $this->permissionService->modelPermission('config', 'email');
        $template = [];
        $data['title'] = $this->title;
        $data['pageTitle'] =$this->pageTitle;

        $template['type'] ='email';
        if($request->has('keywords')){
            $template['keywords'] = $request->keywords;
        }


        $data['emailTemplates'] = $this->model->getTemplates($template);

        return view($this->viewPath.'.index',$data);

    }

//    public function create(Request $request){
//
//        $data['title'] = $this->title;
//        $data['pageTitle'] =$this->pageTitle;
//
//        return view($this->viewPath.'.create',$data);
//    }

    public function store(EmailTemplateRequest $request){
            $insertedData['title'] = $request->title;
            $insertedData['code'] = $request->code;
            $insertedData['subject'] = $request->subject;
            $insertedData['from'] = $request->from;
            $insertedData['template'] = $request->template;
            $insertedData['type'] = 'email';

            try{
                $emailTemplate = $this->model->create($insertedData);
                return redirect($this->redirectUrl)->withErrors(['alert-success'=>'Successfully added!']);
            }
            catch (\Exception $e) {
//                dd($e);
                return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Data was not saved!']);
            }


    }

    public function edit(EmailTemplateRequest $request,$emailTemplateId){
//        $data = $this->permissionService->modelPermission('config', 'email');
        $data['title'] = $this->title;
        $data['pageTitle'] =$this->pageTitle;
        try{
            $data['emailTemplate'] = $this->model->findOrFail($emailTemplateId);

        }catch (\Exception $exception){
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Invalid Character in the URL']);
        }
        return view($this->viewPath.'.edit',$data);
    }


    /**
     * @param EmailTemplateRequest $request
     * @param                      $emailTemplateId
     * @return $this
     */
    public function update(EmailTemplateRequest $request,$emailTemplateId){

        if(!is_numeric($emailTemplateId)){
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Invalid character used in URL!']);
        }

        $updateData['title'] = $request->title;
        $updateData['code'] = $request->code;
        $updateData['subject'] = $request->subject;
        $updateData['from'] = $request->from;
        $updateData['template'] = $request->template;
        $updateData['type'] = 'email';

        try{

            $emailTemplate = $this->model->findOrFail($emailTemplateId);

            $emailTemplate->update($updateData);
            return redirect($this->redirectUrl)->withErrors(['alert-success'=>'Successfully updated!']);

        }catch (\Exception $exception){

            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Data was not saved!']);
        }
    }

    public function destroy(Request $request,$emailTemplateId){

        if(!is_numeric($emailTemplateId)){
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Invalid character used in URL!']);
        }

        try{
            $emailTemplate = $this->model->findOrFail(Input::get('id'));
            $emailTemplate->delete();
            return redirect($this->redirectUrl)->withErrors(['alert-success'=>'Successfully deleted!']);

        }catch (\Exception $exception){

            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Error! Unable to delete']);
        }


    }


}
