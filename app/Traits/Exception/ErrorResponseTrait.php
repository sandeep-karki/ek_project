<?php
/**
 * Created by PhpStorm.
 * User: roshanranabhat
 * Date: 2/15/18
 * Time: 12:40 PM
 */

namespace App\Traits\Exception;


use Illuminate\Support\Facades\Input;

trait ErrorResponseTrait
{

    protected $statusCode = 200;

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }


    /**
     * @param null $key
     * @param      $message
     * @param null $titleMessage
     * @return mixed
     */
    protected function respondWithError($message, $code=null, $key=null, $titleMessage=null)
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

        $error['title'] = is_null($titleMessage) ? $message : $titleMessage;

        $error['detail'] = $message;
        $jsonApiError['errors'][] = $error;


        return $this->metaEncode($jsonApiError);
    }

    /**
     * @param $response
     * @return mixed
     * add meta information to payload
     */
    protected function metaEncode($response)
    {
        $json1 = json_encode($response);
        $meta = json_encode([
            'meta' =>[
                'copyright' => "Copyright 2017 Ekbana Pte",
                'emails' =>"ekbana@info.com,roshanr@ekbana.com",


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

    /**
     * @param array $array
     * @param array $headers
     * @return \Illuminate\Http\Response
     */
    protected function respondWithArray(array $array, array $headers = [])
    {
        $mimeTypeRaw = Input::server('HTTP_ACCEPT', '*/*');

        // If its empty or has */* then default to JSON
        if ($mimeTypeRaw === '*/*') {
            $mimeType = 'application/json';
        } else {
            $mimeParts = (array) explode(';', $mimeTypeRaw);
            $mimeType = strtolower($mimeParts[0]);
        }

        switch ($mimeType) {
            case 'application/json':
                $contentType = 'application/json';
                $content = json_encode($array);
                break;

            default:
                $contentType = 'application/json';
                $content = json_encode($array);
        }
        $response = response()->make($content, $this->statusCode, $headers);

        $response->header('Content-Type', $contentType);

        return $response;
    }


}