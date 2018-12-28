<?php

namespace App\Http\Controllers\Admin\language;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;
use App\Language;
use App\LanguageCategory;
use App\Services\ConstantMessageService;
use App\SystemLanguage;
use File;
use Illuminate\Http\Request;
use Image;
use Redirect;

class languagesController extends Controller {
	public function __construct(Country $country) {

		$this->pageTitle = "Languages";
		$this->redirectUrl = PREFIX . '/languages';
		$this->viewUrl = BACKEND . "/languages/lang";
		$this->flag = public_path() . '/uploads/flag';
		$this->countries = $country->get(['alpha_code', 'name'])->pluck('alpha_code', 'name');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$data['pageTitle'] = $this->pageTitle;
		$data['pageData'] = Language::paginate(50);
        $data['countries'] = $this->countries;
		return view($this->viewUrl . '.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(LanguageRequest $request) {
	    abort(404);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(LanguageRequest $request) {
		try {
			$attributes = $request->except('_token');
			if ($request->hasFile('flag')) {
				$attributes['flag'] = $this->uploadFiles($request->file('flag'));
			}

			$createdData = Language::create($attributes);
			return redirect($this->redirectUrl)->withErrors(['alert-success' => ConstantMessageService::SUCCESS]);
		} catch (Exception $e) {
			return redirect($this->redirectUrl)->withErrors(['alert-danger' => ConstantMessageService::ADD_FAIL]);
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(LanguageRequest $request, $id) {
        abort(404);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(LanguageRequest $request, $id) {
		$responseData = Language::findOrFail($id);
		try {
			$attributes = $request->except('_token');
			if ($request->hasFile('flag')) {
				$attributes['flag'] = $this->uploadFiles($request->file('flag'));
				if (!empty($responseData->flag)) {
					File::delete($this->flag . '/' . $responseData->flag);
				}

			}
			$responseData->update($attributes);
			return redirect($this->redirectUrl)->withErrors(['alert-success' => ConstantMessageService::UPDATE]);
		} catch (Exception $e) {
			return redirect($this->redirectUrl)->withErrors(['alert-danger' => ConstantMessageService::UPDATE_FAIL]);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(LanguageRequest $request, $id) {
		$resData = Language::findOrFail($id);
		if ($resData->short_code == 'eng') {
			return redirect()->back()->withErrors(['alert-danger' => 'Cannot delete system language!']);
		}

		$temp = LanguageCategory::where('default_lang', $resData->id)->count();
		if ($temp > 0) {
			return redirect()->back()->withErrors(['alert-danger' => "Remove this language from defalut before deleting!"]);
		}

		try {
			$resData->delete();
			SystemLanguage::where('language_id', $id)->delete();
			return redirect()->back()->withErrors(['alert-success' => ConstantMessageService::DELETE]);
		} catch (Exception $e) {
			return redirect()->back()->withErrors($e->getMessage());
		}
	}

	public function toggleStatus(Request $request) {
		$id = $request->get('id');
		$responseData = Language::findOrFail($id);
		if ($responseData) {
			if ($responseData->status) {
				$updateData['status'] = false;
			} else {
				$updateData['status'] = true;
			}

			$responseUpdateData = Language::find($id)->update($updateData);
			if ($responseUpdateData) {
				$responseData = Language::find($id);
				if ($responseData->status) {
					echo 'Active';
				} else {
					echo 'Inactive';
				}

			} else {
				header('HTTP/1.1 500 Internal Server Error');
			}
		}
		exit();
	}

	public function uploadFiles($imageFile) {
		if (!file_exists($this->flag)) {
			$result = File::makeDirectory($this->flag, 0775, true);
		}

		$uniqueName = date('ymdHis') . '.' . $imageFile->getClientOriginalExtension();
		$fileNameDir = $this->flag . '/' . $uniqueName;
		$image = Image::make($imageFile);
		$image->resize(30, 30, function ($constraint) {
			$constraint->aspectRatio();
		});
		$image->save($fileNameDir, 100);

		return $uniqueName;
	}
	public function delImage($id) {
		$responseData = Language::findOrFail($id);
		try {
			File::delete($this->flag . '/' . $responseData->flag);
			$attributes['flag'] = '';
			$responseData->update($attributes);
			return redirect()->back()->withErrors(['alert-success' => ConstantMessageService::DELETE_IMG]);
		} catch (Exception $e) {
			return redirect()->back()->withErrors($e->getMessage());
		}

	}
}
