<?php

namespace App\Http\Requests;

use App\Services\PermissionService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SettingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        $permissionService = new PermissionService();
        return $permissionService->modelPermissionRequest($request, 'config', 'settings');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return[
            'label'=>'required|unique:custom_settings',
            'type'=>'required'
        ];
    }

    public function messages()
    {
        return [

        ];
    }
    public function forbiddenResponse()
    {
        return response()->view('errors.403');
    }
}
