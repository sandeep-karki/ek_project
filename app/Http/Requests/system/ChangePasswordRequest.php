<?php

namespace App\Http\Requests\system;

use App\Services\PermissionService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ChangePasswordRequest extends FormRequest
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
    public function rules()
    {
        return [
            //
            'old_password' => [

                'required',
                'oldpassword',
            ],
            'password' => 'required|password|min:6',
            'password_confirmation' =>'required|same:password',

        ];
    }


    public function messages()
    {
        return [
            'old_password.oldpassword'=>'Your old password is incorrect',
            'password.password'=>'Your password must contain at least one uppercase,one lowercase, one number and a special character'
        ];
    }
}
