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

use App\LangWord;
use App\LangTranslation;
use App\Http\Requests\LangWordsRequest;
use App\Services\ConstantMessageService;

class wordsController extends Controller
{
    public function __construct(){

        $this->pageTitle = "Words";
        $this->redirectUrl = PREFIX.'/words';
        $this->viewUrl = BACKEND."/languages/words";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['pageTitle'] = $this->pageTitle;
        $data['pageData'] = LangWord::orderBy('word', 'ASC')->paginate(20);
        
        return view($this->viewUrl . '.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(LangWordsRequest $request)
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LangWordsRequest $request)
    {
        $words = $request->get('words');
        
        try {
            foreach ($words as $val) {
                if(!empty($val)){
                    $resp = LangWord::where('word', $val)->first();
                    if(!$resp){
                        $attributes['word'] = $val;
                        LangWord::create($attributes);
                    }
                }
            }
            return redirect($this->redirectUrl)->withErrors(['alert-success'=>ConstantMessageService::SUCCESS]);
        } catch (Exception $e) {
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>ConstantMessageService::ADD_FAIL]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(LangWordsRequest $request, $id)
    {
        abort(404);
//        $resData = LangWord::findOrFail($id);
//        $data['pageData'] = $resData;
//
//        return view($this->viewUrl .'.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LangWordsRequest $request, $id)
    {
        $responseData = LangWord::findOrFail($id);
        try {
            $attributes = $request->except('_token');
            $responseData->update($attributes);
            return redirect($this->redirectUrl)->withErrors(['alert-success'=>ConstantMessageService::UPDATE]);
        } catch (Exception $e) {
            return redirect($this->redirectUrl)->withErrors(['alert-danger'=>ConstantMessageService::UPDATE_FAIL]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LangWordsRequest $request, $id)
    {
        $resData = LangWord::findOrFail($id);
        $respLangt = LangTranslation::where('word_id', $id)->pluck('id')->toArray();
        if($respLangt) LangTranslation::whereIn('id',$respLangt)->delete();
        try {
            $resData->delete();
            return redirect()->back()->withErrors(['alert-success'=>ConstantMessageService::DELETE]);
        } catch (Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }

}
