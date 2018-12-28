<?php

namespace App\Http\Requests\system;

use App\Services\PermissionService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {

        $permissionService = new PermissionService();
        return $permissionService->modelPermissionRequest($request, 'user', 'user');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {

        if ($request->isMethod('POST') && $request->is('*/user')) {

            return [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users',
                'username' => 'required|unique:users|max:10|regex:/^(?=.{1,15}$)[a-zA-Z][a-zA-Z0-9]*(?: [a-zA-Z0-9]+)*$/',
                'password' => 'sometimes|nullable|min:6|confirmed',
                'password_confirmation' => 'sometimes|nullable|min:6',
                'roles' => 'required',
                'status'    =>  'required',
            ];
        }
        if ($request->isMethod('PUT') || $request->isMethod('PATCH')) {
            return [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users,email,' . $request->get('id'),
                'username' => 'required|min:3|max:10|regex:/^(?=.{1,15}$)[a-zA-Z][a-zA-Z0-9]*(?: [a-zA-Z0-9]+)*$/|unique:users,username,' . $request->get('id'),
                'roles' => 'required',
                'status'=>'required',
            ];
        }

        if ($request->isMethod('POST') && $request->is('*/change_password/*')) {
            return [
                'password' => 'required|password|min:6|confirmed',
                'password_confirmation' => 'required|min:6'
            ];
        }
        if ($request->isMethod('POST') && $request->is('*/update_password/*')) {
            return [
                'password' => 'required|password|min:6|confirmed',
                'password_confirmation' => 'required|min:6'
            ];
        }

        return [
            //
        ];
    }

    public function messages()
    {
        return
            [
                'password.password' =>'The password must contain at least one uppercase, one lowercase, one number and one special character'
            ];

    }
}
