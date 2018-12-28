<?php
use App\Language;
use App\Setting;
use App\LanguageCategory;
use App\LangTranslation;
use App\LangWord;
use Illuminate\Support\Facades\Session;

    function translate($text = '')
    {

        $resWord = LangWord::where('word', $text)->first();
        if($resWord){

            $langId = Session::get('defaultLang');
            $defaultLangId = LanguageCategory::find(1)->default_lang;
//            if($langId) $resLang = Language::find($langId);
//            elseif($defaultLangId) $resLang = Language::find($defaultLangId);
//            else $resLang = Language::find(1);
//            if(!$resLang) return $text;
            if( $langId){
                $languageID =  $langId;
            }else{
                $languageID = $defaultLangId;
            }
            $data['languageShortCode']  = Language::find($languageID);
            $shortCode                  = $data['languageShortCode']->short_code;
            $language_path = storage_path('language/'.$shortCode.'.json');
            if (file_exists($language_path)) {
                $file = file_get_contents($language_path,FILE_USE_INCLUDE_PATH);
                $data['translatedWords'] = json_decode($file,true)[$shortCode];
                return isset($data['translatedWords']) ? isset($data['translatedWords'][$text]) ? $data['translatedWords'][$text] !== null ? $data['translatedWords'][$text] : $text :$text:$text;
            }else{
                return $text;
            }

        }else{
            $attributes['word'] = $text;
            LangWord::create($attributes);
            return $text;
        }
    }

    // function localize($txt = '')
    // {

    //     $default = \Session()->get('default_language');
    //     $def_lang = Language::where('slug', $default)->first();
    //     if (is_null($def_lang)) {
    //         $file = public_path() . '/default_language/lang.json';
    //     } else {
    //         $lang_file = $def_lang->file;
    //         $file = public_path() . '/uploads/language/file/' . $lang_file;
    //     }
    //     $json = file_get_contents($file);
    //     $results = json_decode($json, true);
    //     if ($results !== null) {
    //         if (array_key_exists($txt, $results)) {
    //             return $results[$txt];
    //         } else {
    //             return $txt;
    //         }
    //     } else {
    //         return $txt;
    //     }


    // }

    // function lang()
    // {
    //     $setting = Setting::where('language_selection', 'yes')->first();
    //     if (empty($setting)) {
    //         $alllangs = "";
    //     } else {
    //         $alllangs = Language::where('lang_for', 'backend')->get();
    //     }
    //     return $alllangs;
    // }
