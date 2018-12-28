<?php

namespace App\Http\Requests;

use App\Services\PermissionService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmailTemplateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        $permissionService = new PermissionService();
        return $permissionService->modelPermissionRequest($request, 'config', 'email');
    }

    /**
     * Get the validation rules that apply to the request.
     * @param Request $request
     * @return array
     */
    public function rules(Request $request)
    {

        if ($request->isMethod('POST') || $request->is('*/store')) {
            return [
                'title'=>'required',
                'code'=>'required|unique:email_templates,code',
                'subject'=>'required',
                'from'=>'required|email',
                'template'=>'required',
            ];
        }
        if ($request->isMethod('PUT') || $request->isMethod('PATCH') || $request->is('*/update')) {
            return [
                'title'=>'required',
                'code'=>'required|unique:email_templates,code,'.$id = $request->segment('3'),
                'subject'=>'required',
                'from'=>'required|email',
                'template'=>'required',
            ];
        }

        return [];
        
    }
}
