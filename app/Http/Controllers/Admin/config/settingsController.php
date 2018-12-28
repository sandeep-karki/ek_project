<?php
namespace App\Http\Controllers\Admin\config;

use App\Services\PermissionService;
use Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use File;
use App\Http\Requests\SettingsRequest;
use App\CustomSetting;
use App\Services\ConstantMessageService;
use Illuminate\Support\Facades\Session;



class settingsController extends Controller
{

  public function __construct(CustomSetting $setting) {
    $this->pageTitle = "Website Configuration";
    $this->model = $setting;
    $this->redirectUrl = PREFIX."/settings";
    $this->path=public_path().'/uploads/settings/';
      $this->permissionService = new PermissionService();

  }

  public function index() {
    $pageTitle = $this->pageTitle;
      $fields=CustomSetting::get();
    $timezoneData = $this->getTimeZoneData();
    $data=$this->permissionService->modelPermission('config', 'settings');
    return view('system.settings.index',compact('data','timezoneData','pageTitle','fields'));
  }



  public function getTimeZoneData(){
    $path  = storage_path('json/timezone.json');
    $data  = json_decode(file_get_contents($path));
    $timezoneArray = array();
    foreach($data as $value=>$title){
      $timezoneArray[$value] = $title;
    }
    return $timezoneArray;
  }

  public function store(SettingsRequest $request){
      try {
          $attributes = $request->except('_token');
          CustomSetting::create($attributes);
          return redirect($this->redirectUrl)->withErrors(['alert-success' => ConstantMessageService::SUCCESS]);
      } catch (Exception $e) {
          return redirect($this->redirectUrl)->withErrors(['alert-danger' => ConstantMessageService::ADD_FAIL]);
      }
  }

  public function updateAll(Request $request){
      try {
      $fields=CustomSetting::get();
      $attributes=$request->all();
      foreach($fields as $f){
          $f->value=!empty($attributes['field_'.$f->id])?$attributes['field_'.$f->id]:$f->value;
          if($f->type=='file' && !empty($attributes['field_'.$f->id])){
              if($f->label=='Cms Logo'){
                  $this->validate($request,[
                      'field_'.$f->id => 'image'
                  ],['field_'.$f->id.'.required' => 'Please upload image for CMS Logo']);
              }
              if(!empty($f->value) && file_exists(public_path().'/uploads/settings/'.$f->value)){
                  File::delete(public_path().'/uploads/settings/' . $f->value);
              }
              if (Input::hasFile('field_'.$f->id)) {

                  if (is_dir($this->path) != true) {
                      \File::makeDirectory($this->path, $mode = 0777, true);
                  }

                  $filename = uniqid() . '.' . $request->file('field_'.$f->id)->getClientOriginalExtension();

                  if (Input::file('field_'.$f->id)->move($this->path, $filename)) {
                      $f->value = $filename;
                  } else {
                      $f->value = "";
                  }

              } else {
                  $f->value = "";
              }
          }
          $f->save();
          Session::put('color',CustomSetting::where('label','Cms Theme Color')->first()->value);
          Session::put('cmslogo',CustomSetting::where('label','Cms Logo')->first()->value);
          Session::put('cmstitle',CustomSetting::where('label','Cms Title')->first()->value);

      }
      return redirect($this->redirectUrl)->withErrors(['alert-success' => ConstantMessageService::SUCCESS]);
      } catch (Exception $e) {
          return redirect($this->redirectUrl)->withErrors(['alert-danger' => ConstantMessageService::ADD_FAIL]);
      }
  }

    public function destroy(Request $request, $id) {
        $data = CustomSetting::findOrFail($id);
        if (!$data->id > 3) {
            return redirect()->back()->withErrors(['alert-danger' => 'Cannot delete the default settings!']);
        }

        try {
            $data->delete();
            return redirect()->back()->withErrors(['alert-success' => ConstantMessageService::DELETE]);
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function delImage($id) {
        $responseData = CustomSetting::findOrFail($id);
        try {
            File::delete(public_path().'/uploads/settings/' . $responseData->value);
            $attributes['value'] = '';
            $responseData->update($attributes);
            return redirect()->back()->withErrors(['alert-success' => ConstantMessageService::DELETE_IMG]);
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }

    }

}
