<?php

namespace App\Http\Requests\system;

use App\Services\PermissionService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RolesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {

        $permissionService = new PermissionService();
        return $permissionService->modelPermissionRequest($request, 'user', 'role');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        if ($request->isMethod('POST')) {
            return [
                'name' => 'required|unique:roles',
                'permissions' => 'required',
            ];
        }
        if ($request->isMethod('PUT') || $request->isMethod('PATCH')) {
            return [
                'name' => 'required|unique:roles,name,' . $request->get('id'),
                'permissions' => 'required',
            ];
        }
        return [
            //
        ];
    }
}
