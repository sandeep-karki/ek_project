<?php

namespace App\Http\Requests;

use App\Language;
use App\LanguageCategory;
use App\Services\PermissionService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Input;

class PageValidationRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize(Request $request) {
		// Determine if the user is authorized to create an entry,
        $permissionService = new PermissionService();
        return $permissionService->modelPermissionRequest($request, 'page', 'page');
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules(Request $request, Language $language) {
		if ($request->isMethod('POST') && $request->is('*/store')) {
			$rules = [
				'title' => 'required|max:200',
				'slug' => 'required|unique:pages|min:2|regex:/^([a-z0-9._-]+)$/',

				'position' => 'required|integer|min:1|max:100',
				'flags' => 'required',

				'background_image' => 'mimes:jpeg,bmp,png',
			];
			$flags = $request->flags;
			if (!empty($flags)) {
				foreach ($flags as $flagId) {
					if ($_POST['title_' . $flagId]) {
						$rules['description_' . $flagId] = 'required';
						$rules['background_image_' . $flagId] = 'mimes:jpeg,bmp,png';
						// $rules['short_description_'.$flagId]='sometimes';
						$rules['html_title_' . $flagId] = 'max:100';
						$rules['html_description_' . $flagId] = 'max:100';
						$rules['html_keywords_' . $flagId] = 'max:100';
					}
					if ($_POST['title_' . $flagId]) {
						$rules['description_' . $flagId] = 'required';
						$rules['background_image_' . $flagId] = 'mimes:jpeg,bmp,png';
						// $rules['short_description_'.$flagId]='sometimes';
						$rules['html_title_' . $flagId] = 'max:100';
						$rules['html_description_' . $flagId] = 'max:100';
						$rules['html_keywords_' . $flagId] = 'max:100';
					}
				}
			}
			return $rules;

		}

		if ($request->isMethod('PUT') || $request->isMethod('PATCH') ||  $request->is('*/update')) {
			$reqId = $request->id;
			$rules = [
				'title' => 'required|max:200',
				'slug' => 'required|min:2|regex:/^([a-z0-9._-]+)$/|unique:pages,slug,' . $reqId,
				'status' => 'required',
				// 'menu_type'=>'sometimes',
				'position' => 'required|integer|min:1|max:100',
				// 'parent_id'=>'required|numeric',
				'flags' => 'required',

				'background_image' => 'mimes:jpeg,bmp,png',
			];
			$flags = $request->flags;
			if (!empty($flags)) {
				foreach ($flags as $flagId) {
					if ($_POST['title_' . $flagId]) {
						$rules['description_' . $flagId] = 'required';
						$rules['background_image_' . $flagId] = 'mimes:jpeg,bmp,png';
						// $rules['short_description_'.$flagId]='sometimes';
						$rules['html_title_' . $flagId] = 'max:150';
						$rules['html_description_' . $flagId] = 'max:150';
						$rules['html_keywords_' . $flagId] = 'max:150';
					}
					if ($_POST['description_' . $flagId]) {
						$rules['title_' . $flagId] = 'required';
						$rules['background_image_' . $flagId] = 'mimes:jpeg,bmp,png';
						// $rules['short_description_'.$flagId]='sometimes';
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

		// $message['parent_id.min']='A parent must be selected.';
		if (!empty(Input::get('flags'))) {
			$flags = Input::get('flags');
			foreach ($flags as $flagId) {
				$flag = Language::where('id', $flagId)->first();
				$default = LanguageCategory::find(1)->default_lang;

				if ($_POST['title_' . $flagId] || $_POST['description_' . $flagId]) {
					$message['title_' . $flagId . '.required'] = 'Title is required for ' . $flag->name;
					$message['description_' . $flagId . '.required'] = 'Description is required for ' . $flag->name;
					// $message['image_' . $flagId . '.dimensions'] = 'Image must have width of 800px and height of 400px for ' . $flag->name;
					$message['background_image_' . $flagId . '.mimes'] = 'Image input must be in one of jpeg,bmp,png format for ' . $flag->name;

				}
			}
		}
		return $message;
	}
	public function forbiddenResponse() {
		return response()->view('errors.403');
	}
}
