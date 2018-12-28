<?php
namespace App\Services;

use App\Http\Controllers\Controller;
use App\Services\ConstantStatusService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Manager;
use Symfony\Component\Yaml\Dumper as YamlDumper;
use Input;
use Response;

class CommonService
{
    public function __construct()
    {
        $this->fractal = new Manager();
    }

    protected $statusCode = 200;
    const CODE_WRONG_ARGS = '111';
    const CODE_NOT_FOUND = '112';
    const CODE_INTERNAL_ERROR = '113';
    const CODE_UNAUTHORIZED = '114';
    const CODE_FORBIDDEN = '115';
    const CODE_INVALID_MIME_TYPE = '116';

    public function getStatusCode()
    {
        return $this->statusCode;
    }


    public function validatePayload($payload, $rules = [], $message = [])
    {
        $validator = \Validator::make($payload, $rules, $message);

        if ($validator->fails()) {
            return $validator;
        } else {
            return null;
        }
    }


    public function errorUnprocessableMultipleEntity($validator, $titleMessage = null)
    {
        $errorData = array();
        foreach ($validator->errors()->toArray() as $key => $value) {
            $pointer = 'pointer';

            foreach ($value as $v) {
                $jsonErrorMessage['code'] = trans("code." . $key);
                $jsonErrorMessage['source'] = $pointer . '":' . '"' . '/data/attributes/' . $key;
                if ($titleMessage == null) {
                    $jsonErrorMessage['title'] = $v;
                } else {
                    $jsonErrorMessage['title'] = $titleMessage;
                }
                $jsonErrorMessage['detail'] = $v;

                array_push($errorData, $jsonErrorMessage);
            }
        }
        $jsonError['errors'] = $errorData;
        $this->setStatusCode(ConstantStatusService::UNPROCESSABLEENTITY);
        return $this->metaEncode($jsonError);
    }

    public function errorCustomError($error, $titleMessage = null,$statusCode)
    {
        $pointer = 'pointer';

        $jsonErrorMessage['code'] = trans("code." . $error['error']);
        $jsonErrorMessage['source'] = $pointer . '":' . '"' . '/data/attributes/' . $error['error'];
        if ($titleMessage == null) {
            $jsonErrorMessage['title'] = $error['message'];
        } else {
            $jsonErrorMessage['title'] = $error['message'];
        }
        $jsonErrorMessage['detail'] = $error['message'];
        $jsonError['errors'][] = $jsonErrorMessage;
        $this->setStatusCode($statusCode);
        $data = $this->metaEncode($jsonError);
        return $data;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    protected function metaEncode($response)
    {
        $json1 = json_encode($response);
        $meta = json_encode([
            'meta' => [
                'copyright' => "Copyright 2017 Ekbana Pte",
                'emails' => "ekbana@info.com,roshanr@ekbana.com",


                'api' => [
                    'version' => "0.2"
                ]
            ]
        ]);
        $array1 = json_decode($meta, TRUE);
        $array2 = json_decode($json1, TRUE);
        $data = array_merge_recursive($array1, $array2);
        return $this->respondWithArray($data);


    }

    protected function respondWithArray(array $array, array $headers = [])
    {
        $mimeTypeRaw = Input::server('HTTP_ACCEPT', '*/*');

        // If its empty or has */* then default to JSON
        if ($mimeTypeRaw === '*/*') {
            $mimeType = 'application/json';
        } else {
            $mimeParts = (array)explode(';', $mimeTypeRaw);
            $mimeType = strtolower($mimeParts[0]);
        }

        switch ($mimeType) {
            case 'application/json':
                $contentType = 'application/json';
                $content = json_encode($array);
                break;

            case 'application/x-yaml':
                $contentType = 'application/x-yaml';
                $dumper = new YamlDumper();
                $content = $dumper->dump($array, 2);
                break;

            default:
                $contentType = 'application/json';
                $content = json_encode([
                    'error' => [
                        'code' => static::CODE_INVALID_MIME_TYPE,
                        'http_code' => 415,
                        'message' => sprintf('Content of type %s is not supported.', $mimeType),
                    ]
                ]);
        }
        $response = Response::make($content, $this->statusCode, $headers);

        $response->header('Content-Type', $contentType);

        return $response;
    }

    public function respondWithItem($item, $callback)
    {
        $resource = new Item($item, $callback);

        $rootScope = $this->fractal->createData($resource);

        return $this->metaEncode($rootScope->toArray());
    }

    public function sendEmail($subject,$message,$email, $displayName,$url,$baseUrl)
    {
        $emailData['subject'] = $subject;
        $emailData['email'] = $email;
        $emailData['message'] = $message;
        $emailData['username'] = $displayName;
        $emailData['activateUrl'] = $url;
        $emailData['baseUrl'] = $baseUrl;

        Mail::send('api.modules.email.sendEmail', $emailData, function ($message) use ($emailData) {
            $message->from(env('MAIL_USERNAME'));
            $message->to($emailData['email'])->subject($emailData['subject']);
        });


        $jsonResponse['message'] = ConstantApiMessageService::FORGOTPASSWORDRESPONSE;
        $jsonResponse['status_code'] = ConstantStatusService::OKSTATUS;
        return response()->json($jsonResponse, $jsonResponse['status_code']);
    }

    public function errorInternalError($message = 'Internal Error',$code = null)
    {
        return $this->setStatusCode($code !== null ? $code : 500)
            ->respondWithError($message, self::CODE_INTERNAL_ERROR);
    }

    protected function respondWithError($message,$code=null,$key=null,$titleMessage=null)
    {
        if ($this->statusCode === 200) {
            trigger_error(
                "You better have a really good reason for erroring on a 200...",
                E_USER_WARNING
            );
        }
        if($key != null) {
            $pointer = 'pointer';
            $error['source'] = $pointer . '":' . '"' . '/data/attributes/' . $key;
            $error['code'] = trans("code.".$key);
        }else{
            $error['code'] = $code;
        }


        if($titleMessage != null)
            $error['title'] = $titleMessage;
        $error['detail'] = $message;
        $jsonApiError['errors'][] = $error;


        return $this->metaEncode($jsonApiError);
    }



}