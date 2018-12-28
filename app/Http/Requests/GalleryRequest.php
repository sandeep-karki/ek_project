<?php

namespace App\Http\Requests;

use App\Language;
use App\LanguageCategory;
use App\Services\PermissionService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Input;

class GalleryRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize(Request $request) {
        $permissionService = new PermissionService();
        return $permissionService->modelPermissionRequest($request, 'gallery', 'gallery');
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules(Request $request, Language $language) {
		if ($request->isMethod('POST') || $request->is('*/store')) {
			$rules = [
				'slug' => 'required|unique:galleries|min:2|regex:/^([a-z0-9._-]+)$/',
				'position' => 'required|integer|min:1|max:99999',
				'image' => 'required|mimes:jpg,jpeg,png',
				'flags' => 'required',
			];
			$flags = $request->flags;
			if (!empty($flags)) {
				foreach ($flags as $flagId) {
					$flag = $language->where('id', $flagId)->first();
					$default = LanguageCategory::find(1)->default_lang;
					if ($_POST['title_' . $flagId] || $_POST['description_' . $flagId]) {
						$rules['title_' . $flagId] = 'required';
						$rules['description_' . $flagId] = 'required';
						$rules['html_title_' . $flagId] = 'max:150';
						$rules['html_description_' . $flagId] = 'max:150';
						$rules['html_keywords_' . $flagId] = 'max:150';
					}
				}
			}
			return $rules;

		}

		if ($request->isMethod('PUT') || $request->isMethod('PATCH') ||  $request->is('*/update')) {
			$reqId = $request->id;
			$rules = [
				'slug' => 'required|min:2|regex:/^([a-z0-9._-]+)$/|unique:galleries,slug,' . $reqId,
				'status' => 'required',
				'position' => 'required|integer|min:1|max:99999',
				'image' => 'sometimes|mimes:jpg,jpeg,png',
				'flags' => 'required',
			];
			$flags = $request->flags;
			if (!empty($flags)) {
				foreach ($flags as $flagId) {
					$flag = $language->where('id', $flagId)->first();
					$default = LanguageCategory::find(1)->default_lang;
					if ($_POST['title_' . $flagId] || $_POST['description_' . $flagId]) {
						$rules['title_' . $flagId] = 'required';
						$rules['description_' . $flagId] = 'required';
						$rules['html_title_' . $flagId] = 'max:150';
						$rules['html_description_' . $flagId] = 'max:150';
						$rules['html_keywords_' . $flagId] = 'max:150';
					}
				}
			}
			return $rules;

		}

		return [

		];
	}

	public function messages() {

		$message = [];
		$message['position' . '.min'] = "The position must be equals or greater than 1.";
		$message['image' . '.required'] = "Please upload image for the gallery.";
		if (!empty(Input::get('flags'))) {
			$flags = Input::get('flags');
			foreach ($flags as $flagId) {
				$flag = Language::where('id', $flagId)->first();
				$default = LanguageCategory::find(1)->default_lang;

				if ($_POST['title_' . $flagId] || $_POST['description_' . $flagId]) {
					$message['title_' . $flagId . '.required'] = 'Title is required for ' . $flag->name;
					$message['description_' . $flagId . '.required'] = 'Description is required for ' . $flag->name;
				}
			}
		}
		return $message;
	}
	public function forbiddenResponse() {
		return response()->view('errors.403');
	}
}
