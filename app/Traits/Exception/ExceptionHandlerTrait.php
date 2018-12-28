<?php
/**
 * Created by PhpStorm.
 * User: roshanranabhat
 * Date: 2/15/18
 * Time: 12:36 PM
 */

namespace App\Traits\Exception;

use GuzzleHttp\Exception\GuzzleException;

trait ExceptionHandlerTrait
{
    use ErrorResponseTrait;

    /**
     * @param GuzzleException $exception
     * @return \Illuminate\Http\Response
     */
    function handleGuzzleException(GuzzleException $exception)
    {
        if ($exception->hasResponse()) {
            $response = $exception->getResponse();
            $message = json_decode($response->getBody(), true);
            $statusCode = $response->getStatusCode();

            $this->setStatusCode($statusCode ?: 400);
            return $this->respondWithArray($message);
        } else {
            $message = $exception->getMessage();
            $statusCode = $exception->getCode();

            $this->setStatusCode($statusCode ?: 400);
            return $this->respondWithError($message);
        }

    }


    /**
     * @param      $message
     * @param null $statusCode
     * @param null $key
     * @return mixed
     */
    function handleException($message, $statusCode = null, $key = null)
    {

        $this->setStatusCode($statusCode != null ? $statusCode : 400);
        return $this->respondWithError($message, null, $key);
    }

}