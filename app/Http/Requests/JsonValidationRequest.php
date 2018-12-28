<?php

namespace App\Http\Requests;

use App\Services\ConstantApiMessageService;
use App\Services\ConstantStatusService;
use League\Fractal\Serializer\JsonApiSerializer;

class JsonValidationRequest extends JsonApiSerializer
{

    // protected  $data;

    public function __construct()
    {
    }

    public function validateJsonSpec($data)
    {
        if (empty($data) == true) {
            $message = ConstantApiMessageService::JSONPARSEERROR;
            $status = ConstantStatusService::BADREQUEST;
            $error = $this->missingDataAttribute($status,null,null,$message);
            return response()->json($error,ConstantStatusService::BADREQUEST);
        }elseif (empty($data['data'])== true) {
            $message = ConstantApiMessageService::MISSINGJSONDATA;
            $key = '/data';
            $error = $this->missingDataAttribute(null,null,$key,$message);
            return response()->json($error,ConstantStatusService::UNPROCESSABLEENTITY);
        }
        $resource = $data['data'];

        if (!array_key_exists('type', $resource)) {
            $key = '/data/type';
            $message = ConstantApiMessageService::VALIDJSONTYPE;
            $error = $this->missingDataAttribute(null,null,$key,$message);
            return response()->json($error,ConstantStatusService::UNPROCESSABLEENTITY);
        } elseif (!array_key_exists('attributes', $resource)) {
            $key = '/data/attributes';
            $message = ConstantApiMessageService::VALIDJSONATTRIBUTE;
            $error = $this->missingDataAttribute(null,null,$key,$message);
            return response()->json($error,ConstantStatusService::UNPROCESSABLEENTITY);
        }elseif (empty($resource['attributes']) == true) {
            $key = '/data/attributes';
            $message = ConstantApiMessageService::ATTRIBUTESNOTEMPTY;
            $error = $this->missingDataAttribute(null,null,$key,$message);
            return response()->json($error,ConstantStatusService::UNPROCESSABLEENTITY);
        } else {
            return false;
        }
    }

    public function validateBulkJson($data)
    {

        if ($this->isCollection($data)) {
            $resources = $data['data'];
            foreach ($resources as $resource) {
                if (!array_key_exists('type', $resource)) {
                    $key = '/data/type';
                    $message = ConstantApiMessageService::VALIDJSONTYPE;
                    $error = $this->missingDataAttribute(null,null,$key,$message);
                    return response()->json($error,ConstantStatusService::UNPROCESSABLEENTITY);
                } elseif (!array_key_exists('attributes', $resource)) {
                    $key = '/data/attributes';
                    $message = ConstantApiMessageService::VALIDJSONATTRIBUTE;
                    $error = $this->missingDataAttribute(null,null,$key,$message);
                    return response()->json($error,ConstantStatusService::UNPROCESSABLEENTITY);
                } else {
                    return false;
                }
            }

        }

    }

    public function validateRelationShipSpec($data)
    {
        if (empty($data) == true) {
            $message = ConstantApiMessageService::JSONPARSEERROR;
            $status = ConstantStatusService::BADREQUEST;
            $error = $this->missingDataAttribute($status,null,null,$message);
            return response()->json($error,ConstantStatusService::BADREQUEST);
        } else {
            return false;
        }

    }

    public function missingDataAttribute($status,$code,$value,$message,$titleMessage = null)
    {
        $key = 'pointer';

        if (empty($value) == false && empty($code) == false && empty($status) == false) {
            $error['source'] = $key.'":' .'"'. $value;
            $error['code'] = $code;
            $error['status'] = $status;
        }elseif (empty($value) == false && empty($code) == false) {
            $error['source'] = $key.'":' .'"'. $value;
            $error['code'] = $code;
        }elseif (empty($value) == false) {
            $error['source'] = $key .'":'. '"'.$value;
        } elseif (empty($code) == false) {
            $error['code'] = $code;
        } elseif (empty($status) == false) {
            $error['status'] = $status;
        }
        if ($titleMessage != null) $error['title'] = $titleMessage;
        $error['detail'] = $message;
        $jsonApiError['jsonapi'] = array('version'=>(string)1.0);
        $jsonApiError['errors'][] = $error;
        return $jsonApiError;
    }


}
