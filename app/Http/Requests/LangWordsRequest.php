<?php

namespace App\Http\Requests;

use App\Services\PermissionService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class LangWordsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {

        $permissionService = new PermissionService();
        return $permissionService->modelPermissionRequest($request, 'language', 'words');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        // if ($request->isMethod('POST') || $request->is('*/store')) {
        //     return [
        //         'word' => 'required|unique:lang_words',
        //     ];
        // }
        if ($request->isMethod('PUT') || $request->isMethod('PATCH') || $request->is('*/update')) {
          return [
              'word' => 'required|unique:lang_words,word,' . $request->get('id'),
          ];
        }

        return [];
    }
}
