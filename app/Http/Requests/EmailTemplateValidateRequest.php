<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class EmailTemplateValidateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {


      // Determine if the user is authorized to update an entry.
      if ($request->isMethod('PUT') || $request->isMethod('PATCH') || $request->is('*/update') || $request->is('*/edit')) {
        return $request->user()->canDo('config.email.edit');
      }
      // // Determine if the user is authorized to delete an entry.
      // if ($request->isMethod('DELETE') || $request->is('*/destroy')) {
      //   return $request->user()->canDo('news.news.destroy');
      // }
      return true;
      }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {

      if ($request->isMethod('POST') && $request->is('*/store')) {
      return [
        'title'=>'required',
            'email_subject'=>'required',
            'email_body' => 'required',
            'code' => 'required',

      ];
    }
    if ($request->isMethod('PATCH')) {

      return [
        'title'=>'required',
            'email_subject'=>'required',
            'email_body' => 'required',
            'code' => 'required',
      ];
    }
    return [
        //
    ];
    }
}
