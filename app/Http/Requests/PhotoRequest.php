<?php

namespace App\Http\Requests;

use App\Language;
use App\Services\PermissionService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PhotoRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize(Request $request) {
        $permissionService = new PermissionService();
        return $permissionService->modelPermissionRequest($request, 'gallery', 'photo');
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules(Request $request, Language $language) {
		if ($request->isMethod('POST') || $request->is('*/store')) {
			$rules = [
				'position' => 'required|integer|min:1|max:100',
				'flags' => 'required',
				'status' => 'required',
				'image' => 'required|mimes:jpeg,bmp,png',
			];
			return $rules;
		}

		if ($request->isMethod('PUT') || $request->isMethod('PATCH') ||  $request->is('*/update')) {
			$reqId = $request->id;
			$rules = [
				'position' => 'required|integer|min:1|max:100' ,
				'flags' => 'required',
				'status' => 'required',
				'image' => 'mimes:jpeg,bmp,png',
			];

			return $rules;

		}

		return [

		];
	}

	public function messages() {

		$message = [];
		$message['position' . '.min'] = "The position must be equals or greater than 1.";

		return $message;
	}
	public function forbiddenResponse() {
		return response()->view('errors.403');
	}
}
