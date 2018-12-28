<?php

namespace App\Http\Controllers\Admin\config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Api\Devices;
use Input;
use Image;
use File;
use App\Setting;
use App\Http\Requests\SettingsRequest;
use DB;
use App\Products;
use App\ProductCategory;
use App\Notification;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use FCM;

class notificationController extends Controller
{
    public function __construct(Notification $notification) {
        $this->pageTitle = "Notification Configuration";
        $this->model = $notification;
        $this->redirectUrl = PREFIX."/notification";
    }

    public function index() {
        $pageTitle = $this->pageTitle;
        $alldata = $this->model->getAllData(Input::all());
        // $data=Notification::get();
        
        // $products = Products::where('is_active', True)->pluck('title', 'id')->prepend('Select Products', '')->toArray();
        // $categories = ProductCategory::where('status', True)->pluck('title', 'id')->prepend('Select Category', '')->toArray();
        // $type = ["" => 'Select Type'] + ['product' => 'Product', 'category' => 'Category', 'none' => 'None'];
        $timezoneData = $this->getTimeZoneData();
        return view('backend.notification.index',compact('timezoneData','pageTitle','alldata'));
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

    public function store(Request $request){


        $this->validate($request, [
            'title' => 'required|min:4',
            'message' => 'required|min:4',
            
        ]
        
    ); 
            $data =$request->all();       
            try{
                             
                // foreach ($datas as $data)
                // {
                //     $this->sendpush($request->title,$request->message,$dataArray,$data->device_token,$clickAction);
                // }

             $client = new Client();
                       
             $title=$request['title'];
             $message=$request['message'];
             $image='';
             $url=env('NOTIFICATION_URL','');
             $request = $client->request('POST', $url, [
                'headers'=>[
                    'Content-Type'=>'application/json'
                ],
                'json' => [
                                'Title'=>$title,
                                'Body'=>$message,
                                'ImageURL'=>$image ,
                ],
                'http_errors'=>true,
            
            ]); 
            if($request->getStatusCode()==200)
            {
                 $this->model->create($data);  
                return redirect($this->redirectUrl)->withErrors(['alert-success'=>'Successfully sent!']);
            }else{
                return redirect($this->redirectUrl)->withErrors(['alert-danger'=>'Push notification failed to send']);
            }
            }catch (\Exception $e)
            {
                return redirect($this->redirectUrl)->withErrors(['alert-danger'=>$e->getMessage()]);
            }


            return redirect($this->redirectUrl)->withErrors(['alert-success'=>'Successfully sent!']);
        
    }


    // public function getDeviceTokens()
    // {

    //     $datas =  DB::select("SELECT DISTINCT ON (device_id) * FROM devices ORDER BY device_id,created_at DESC");
    //     return $datas;
    // }

    /**
     * @param $title
     * @param $body
     * @param $dataarray
     * @param $token
     * @return Response
     * @throws \LaravelFCM\Message\InvalidOptionException
     */
    // public function sendpush($title, $body, $dataarray, $token,$clickAction)
    // {


    //     $optionBuiler = new OptionsBuilder();
    //     $optionBuiler->setTimeToLive(60 * 20);

    //     $notificationBuilder = new PayloadNotificationBuilder($title);
    //     $notificationBuilder->setBody($body)
    //                         ->setClickAction($clickAction)
    //         ->setSound('');

    //     $dataBuilder = new PayloadDataBuilder();
    //     $dataBuilder->addData($dataarray);

    //     $option = $optionBuiler->build();
    //     $notification = $notificationBuilder->build();
    //     $data = $dataBuilder->build();

    //     $token = $token;

    //     $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);
    //     //dd($downstreamResponse);

    //     $downstreamResponse->numberSuccess();
    //     $downstreamResponse->numberFailure();
    //     $downstreamResponse->numberModification();
    //     //return Array - you must remove all this tokens in your database
    //     $downstreamResponse->tokensToDelete();
    //     //return Array (key : oldToken, value : new token - you must change the token in your database )
    //     $downstreamResponse->tokensToModify();
    //     //return Array - you should try to resend the message to the tokens in the array
    //     $downstreamResponse->tokensToRetry();
    //     //dd($downstreamResponse);

    //     return new \Response(array('status' =>'1', 'sucess' =>$downstreamResponse->numberSuccess(), 'fail' => $downstreamResponse->numberFailure(), 'msg' =>$downstreamResponse->tokensWithError()), 200);

    // }

}
