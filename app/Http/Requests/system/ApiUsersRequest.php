<?php

namespace App\Http\Requests\system;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ApiUsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {

        if ($request->isMethod('POST') || $request->is('*/user')) {
            return [

                'email' => 'required|email|unique:api_users',

            ];
        }
        if ($request->isMethod('PUT') || $request->isMethod('PATCH') ||  $request->isMethod('PATCH')) {
            return [

                'email' => 'required|email|unique:api_users,email,' . $request->get('id'),

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

            ];

    }
}
