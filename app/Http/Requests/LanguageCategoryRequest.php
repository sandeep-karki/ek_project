<?php

namespace App\Http\Requests;

use App\Services\PermissionService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class LanguageCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {

        $permissionService = new PermissionService();
        return $permissionService->modelPermissionRequest($request, 'language', 'langcategory');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        [];  if ($request->isMethod('POST') || $request->is('*/store')) {
            return [
                'name' => 'required'
            ];
        }
        if ($request->isMethod('PUT') || $request->isMethod('PATCH') || $request->is('*/update')) {
          return [
              'name' => 'required'
          ];
        }

        return [];
    }

    public function messages()
    {
        return [];
        // return [
        //     'lang_for.required' => 'Language For must be selected!',
        //     'default.required'  => 'Please Select Default Language',
        //     'slug.max'  => 'Slug must contain only two letters !',
        //     'file.Mimetypes'=>'Please select a valid language json file'
        // ];
    }
    public function forbiddenResponse()
    {
        return response()->view('errors.403');
    }
}
