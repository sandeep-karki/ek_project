<?php

namespace App\Http\Controllers\Admin\language;

use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageCategoryRequest;
use App\Language;
use App\LanguageCategory;
use App\Services\ConstantMessageService;
use App\SystemLanguage;
use Illuminate\Http\Request;
use Redirect;
use Session;

class langcategoryController extends Controller {
	public function __construct() {
		$this->pageTitle = "Language Categories";
		$this->redirectUrl = PREFIX . '/langcategory';
		$this->viewUrl = BACKEND . "/languages/category";
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$data['pageTitle'] = $this->pageTitle;
		$data['pageData'] = LanguageCategory::get();
        $data['languages'] = Language::get();


//        $details = $details->language()->get()->toArray();
//        $data['selectedLang'] = array_pluck($details, 'id');

		return view($this->viewUrl . '.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(LanguageCategoryRequest $request) {
		return view($this->viewUrl . ".create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(LanguageCategoryRequest $request) {
		try {
			$attributes = $request->except('_token');
			LanguageCategory::create($attributes);
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
	public function edit(LanguageCategoryRequest $request, $id) {
		$resData = LanguageCategory::findOrFail($id);
		$data['pageData'] = $resData;

		return view($this->viewUrl . '.edit', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(LanguageCategoryRequest $request, $id) {
		$responseData = LanguageCategory::findOrFail($id);
		try {
			$attributes = $request->except('_token');
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
	public function destroy(LanguageCategoryRequest $request, $id) {
		$resData = LanguageCategory::findOrFail($id);

		try {
			if($resData->id == 1 || $resData->id == 2) return redirect($this->redirectUrl)->withErrors(['alert-danger' => "Cannot delete system data."]);
			$resData->delete();
			return redirect()->back()->withErrors(['alert-success' => ConstantMessageService::DELETE]);
		} catch (Exception $e) {
			return redirect()->back()->withErrors([$e->getMessage()]);
		}
	}

	public function manageLanguage(Request $request, $id) {
		$details = LanguageCategory::find($id);
		if(empty($details)){
            abort(404);
        }
		$details = $details->language()->get()->toArray();
		$data['id'] = $id;
		$data['selectedLang'] = array_pluck($details, 'id');
		$data['languages'] = Language::get();
		return view($this->viewUrl . '.manage-language', $data);

	}

	public function postManageLang(Request $request) {
		$id = $request->get('id');
		$langs = $request->get('lang');

		try {
			$resp = SystemLanguage::where('category_id', $id)->delete();
			if (count($langs) > 0) {
				foreach ($langs as $val) {
					$attributes['category_id'] = $id;
					$attributes['language_id'] = $val;
					SystemLanguage::create($attributes);
				}
			}
			return redirect($this->redirectUrl)->withErrors(['alert-success' => ConstantMessageService::UPDATE]);
		} catch (Exception $e) {
			return redirect($this->redirectUrl)->withErrors(['alert-danger' => ConstantMessageService::UPDATE_FAIL]);
		}
	}

	public function defaultLanguage(Request $request, $id) {
		$respData = LanguageCategory::findOrFail($id);
		$data['languages'] = $respData->language;
		$data['pageData'] = $respData;
		return view($this->viewUrl . '.default-language', $data);
	}

	public function postDefaultLang(Request $request, $id) {
		$responseData = LanguageCategory::findOrFail($id);

		try {
			$attributes['default_lang'] = $request->get('defaultlang');
			$responseData->update($attributes);
			return redirect($this->redirectUrl)->withErrors(['alert-success' => ConstantMessageService::UPDATE]);
		} catch (Exception $e) {
			return redirect($this->redirectUrl)->withErrors(['alert-danger' => ConstantMessageService::UPDATE_FAIL]);
		}
	}

	public function getDefaultLang(Request $request, $defaultLangId)
    {
        $responseData = LanguageCategory::findOrFail(1);
        try {
            $attributes['default_lang'] = $defaultLangId;
            $responseData->update($attributes);
            return redirect($this->redirectUrl)->withErrors(['alert-success' => ConstantMessageService::UPDATE]);
        } catch (Exception $e) {
            return redirect($this->redirectUrl)->withErrors(['alert-danger' => ConstantMessageService::UPDATE_FAIL]);
        }
    }
}
