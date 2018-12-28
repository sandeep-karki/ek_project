<?php
namespace App\Http\Controllers\Api\V2;
/**
 * Created by PhpStorm.
 * User: roshanranabhat
 * Date: 12/11/17
 * Time: 4:23 PM
 */

use App\Http\Controllers\Controller;
use App\Services\ConstantStatusService;
use App\Traits\Exception\ExceptionHandlerTrait;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Manager;
use Input;
use Response;

class ApiController extends Controller
{
    use ExceptionHandlerTrait;

    protected $fractal;

    const CODE_WRONG_ARGS = '111';
    const CODE_NOT_FOUND = '112';
    const CODE_INTERNAL_ERROR = '113';
    const CODE_UNAUTHORIZED = '114';
    const CODE_FORBIDDEN = '115';
    const CODE_INVALID_MIME_TYPE = '116';


    public function __construct(Manager $fractal)
    {
        $this->fractal = $fractal;

    }


    /**
     * @param      $validator
     * @param null $titleMessage
     * @return \Illuminate\Http\JsonResponse
     * return multiple validation error
     */
    public function errorUnprocessableMultipleEntity($validator, $titleMessage = null)
    {
        $errorData = array();
        foreach ($validator->errors()->toArray() as $key => $value) {
            $pointer = 'pointer';
            foreach ($value as $v) {
                $jsonErrorMessage['code'] = trans("code.".$key);
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
        $error['errors'] = $errorData;
        $this->setStatusCode(ConstantStatusService::UNPROCESSABLEENTITY);
        return $this->metaEncode($error);
    }

    /**
     * @param $item
     * @param $callback
     * @return api response as single item
     */
    protected function respondWithItem($item, $callback, $resourceKey = null)
    {
        $resource = new Item($item, $callback);

        $rootScope = $this->fractal->createData($resource);

        return $this->metaEncode($rootScope->toArray());
    }

    /**
     * @param $collection
     * @param $callback
     * @param $resourceKey
     * @return api response as collection
     */
    protected function respondWithCollection($collection, $callback,$resourceKey)
    {
        $paginatedCollection = $collection->getCollection();

        $resource = new Collection($paginatedCollection, $callback,$resourceKey);

        $resource->setPaginator(new IlluminatePaginatorAdapter($collection));

        $rootScope = $this->fractal->createData($resource);

        return $this->metaEncode($rootScope->toArray());
    }


    /**
     * @param $collection
     * @param $callback
     * @param $resourceKey
     * @return mixed
     */
    protected function respondWithCollectionWithoutPagination($collection, $callback,$resourceKey)
    {

        $resource = new Collection($collection, $callback,$resourceKey);

        $rootScope = $this->fractal->createData($resource);

        return $this->metaEncode($rootScope->toArray());
    }


    /**
     * @param array $array
     * @param array $headers
     * @return mixed
     */
    public function respondWithArr(array $array, array $headers = [])
    {

        return $this->metaEncode($array);
    }


    /**
     * Generates a Response with a 403 HTTP header and a given message.
     * @param string $message
     * @return Response
     */
    public function errorForbidden($message = 'Forbidden')
    {
        return $this->setStatusCode(403)
            ->respondWithError($message, self::CODE_FORBIDDEN);
    }

    /**
     * Generates a Response with a 500 HTTP header and a given message.
     *
     * @return Response
     */
    public function errorInternalError($message = 'Internal Error',$code = null)
    {
        return $this->setStatusCode($code !== null ? $code : 500)
            ->respondWithError($message, self::CODE_INTERNAL_ERROR);
    }

    /**
     * Generates a Response with a 404 HTTP header and a given message.
     * @param string $message
     * @return Response
     */
    public function errorNotFound($message = 'Resource Not Found')
    {
        return $this->setStatusCode(404)
            ->respondWithError($message, self::CODE_NOT_FOUND);
    }

    /**
     * Generates a Response with a 401 HTTP header and a given message.
     * @param string $message
     * @return Response
     */
    public function errorUnauthorized($message = 'Unauthorized')
    {
        return $this->setStatusCode(401)
            ->respondWithError($message, self::CODE_UNAUTHORIZED);
    }

    /**
     * Generates a Response with a 400 HTTP header and a given message.
     * @param string $message
     * @return Response
     */
    public function errorWrongArgs($message = 'Wrong Arguments')
    {
        return $this->setStatusCode(400)
            ->respondWithError($message, self::CODE_WRONG_ARGS);
    }

    /**
     * @param string $message
     * @param null   $key
     * @param null   $titleMessage
     * @return mixed
     */
    public function errorUnprocessableSingleEntity($message = 'Unprocessable Entity',$key=null,$titleMessage = null)
    {
        return $this->setStatusCode(422)
            ->respondWithError($message,null,$key, $titleMessage);
    }

    /**
     * @param       $payload
     * @param array $rules
     * @param array $message
     * @return null
     */
    public function validatePayload($payload,$rules =[],$message = [])
    {
        $validator = \Validator::make($payload, $rules,$message);

        if ($validator->fails()) {
            return $validator;
        }else{
            return null;
        }
    }
}
