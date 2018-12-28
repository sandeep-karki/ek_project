<?php

namespace App\Http\Controllers\Admin\language;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use Validator;
use Redirect;
use File;
use Image;
use Hash;

use App\LangTranslation;
use App\LangWord;
use App\Language;
use App\LanguageCategory;
use App\Http\Requests\LangTranslationRequest;
use App\Services\ConstantMessageService;

class translationController extends Controller
{
    public function __construct(){

        $this->pageTitle = "Translation";
        $this->redirectUrl = PREFIX.'/translation';
        $this->viewUrl = BACKEND."/languages/translation";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['pageTitle'] = $this->pageTitle;
        $data['languages']  = Language::pluck('name', 'id')->prepend("---Select ---","")->toArray();

        $langId = $request->get('lang');
        if($langId){
            $data['langTransId']        = LangTranslation::where('language_id', $langId)->pluck('translate_word', 'word_id')->toArray();
            $data['pageData']           = LangWord::orderBy('word', 'ASC')->get();
            $data['languageShortCode']  = Language::find($langId);
            $shortCode                  = $data['languageShortCode']->short_code;
            $language_path = storage_path('language/'.$shortCode.'.json');
            if (file_exists($language_path)) {
                $file = file_get_contents($language_path,FILE_USE_INCLUDE_PATH);
                $data['translatedWords'] = json_decode($file,true)[$shortCode];
            }

            $data['langId']         = $langId;
        }else{
            $langId                     = LanguageCategory::where('name', 'Backend')->pluck('default_lang')->first();
            $data['langTransId']        = LangTranslation::where('language_id', $langId)->pluck('translate_word', 'word_id')->toArray();
            $data['pageData']           = LangWord::orderBy('word', 'ASC')->get();
            $data['langId']             = $langId;
            $data['languageShortCode']  = Language::find($langId);
            $shortCode                  = $data['languageShortCode']->short_code;

            $language_path = storage_path('language/'.$shortCode.'.json');
            if (file_exists($language_path)) {
                $file = file_get_contents($language_path,FILE_USE_INCLUDE_PATH);
                $data['translatedWords'] = json_decode($file,true)[$shortCode];
            }
        }

        return view($this->viewUrl . '.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(LangTranslationRequest $request)
    {
        $data['words']  = array(''=>'---Select Words --') + LangWord::pluck('word', 'id')->toArray();
        $data['languages']  = array(''=>'---Select Languages --') + Language::pluck('short_code', 'id')->toArray();

        return view($this->viewUrl . ".create", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LangTranslationRequest $request)
    {
        try {
            $attributes = $request->except('_token');

            LangTranslation::create($attributes);
            return redirect($this->redirectUrl)->withErrors(['alert-success'=>ConstantMessageService::SUCCESS]);
        } catch (Exception $e) {
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>ConstantMessageService::ADD_FAIL]);
        }
    }

    public function updateTranslation(Request $request)
    {


        $path = storage_path('language');
        if (!File::exists($path)) {
            File::makeDirectory($path,$mode = 0777,true,true);
            chmod($path,0777);
        }
        $language_path = storage_path('language/'.$request->short_code.'.json');
        if (file_exists($language_path)) {
            unlink($language_path);
        }
        $langId             = $request->get('langId');
        $langTrans          = $request->get('transword');
        $langTransWords     = $request->get('transwordWord');
        $contents           = $langTransWords;
        file_put_contents($language_path,trim(json_encode($contents,JSON_UNESCAPED_UNICODE)) . PHP_EOL,FILE_APPEND);


//        foreach ($langTrans as $key => $value) {
//            $attributes     = array();
//            $responseData   = LangTranslation::where('word_id', $key)->where('language_id', $langId)->first();
//            if($responseData){
//                $attributes['translate_word'] = $value;
//                $responseData->update($attributes);
//            }else{
//                $attributes['translate_word'] = $value;
//                $attributes['word_id'] = $key;
//                $attributes['language_id'] = $langId;
//                LangTranslation::create($attributes);
//            }
//        }
        return redirect($this->redirectUrl.'?lang='.$langId)->withErrors(['alert-success'=>ConstantMessageService::UPDATE]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(LangTranslationRequest $request, $id)
    // {
    //     $resData = LangTranslation::findOrFail($id);

    //     try {
    //         $resData->delete();
    //         return redirect()->back()->withErrors(['alert-success'=>ConstantMessageService::DELETE]);
    //     } catch (Exception $e) {
    //         return redirect()->back()->withErrors([$e->message]);
    //     }
    // }

}
