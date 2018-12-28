<?php

namespace App\Traits;

use App\Model\Api\V1\ApiUser;
use App\Services\CommonService;
use  App\Traits\ValidateClient;
use App\Transformers\UserTransformer;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Psr\Http\Message\ServerRequestInterface;
use EkParser;
use Config;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use JWTAuth;
use DB;

trait AuthenticateApiUsers
{
    use ValidateClient;

    public function __construct()
    {
        $this->commonService = new CommonService();
        $this->apiUser = new ApiUser();
    }



    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticateApiUsers(Request $request)
    {

        $dataAttribute = $this->getParsedBody($request);

        $this->validateEntity($dataAttribute);

        try {
            DB::beginTransaction();

            if ($this->apiUser->where('social_id',$dataAttribute->social_id)->first()) {
                $user = $this->apiUser->where('social_id',$dataAttribute->social_id)->first();
            } else {
                $user = $this->apiUser->create($dataAttribute->all());
            }

            $token=JWTAuth::fromUser($user);
            $user->token = $token;
            $user->verified = $user->verified == true ? 1: 0;
            DB::commit();
            return $this->commonService->respondWithItem($user, new UserTransformer(), 'chattyuser');
        } catch (TokenExpiredException $e) {
            DB::rollback();
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            if ($responseBodyAsString) {
                $jsonDecoded = json_decode($responseBodyAsString, true);
                $error['error']=$jsonDecoded['error']['type'];
                $error['message']=$jsonDecoded['error']['message'];
                throw new HttpResponseException($this->commonService->errorCustomError($error, $titleMessage = null,$response->getStatusCode()))  ;
            }

        } catch (TokenInvalidException $e) {
            DB::rollback();
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            if ($responseBodyAsString) {
                $jsonDecoded = json_decode($responseBodyAsString, true);
                $error['error']=$jsonDecoded['error']['type'];
                $error['message']=$jsonDecoded['error']['message'];
                throw new HttpResponseException($this->commonService->errorCustomError($error, $titleMessage = null,$response->getStatusCode()))  ;
            }

        } catch (JWTException $e) {
            DB::rollback();
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            if ($responseBodyAsString) {
                $jsonDecoded = json_decode($responseBodyAsString, true);
                $error['error']=$jsonDecoded['error']['type'];
                $error['message']=$jsonDecoded['error']['message'];
                throw new HttpResponseException($this->commonService->errorCustomError($error, $titleMessage = null,$response->getStatusCode()))  ;
            }


        }
    }

    public function getParsedBody(Request $request)
    {
        $data = EkParser::get("data");
        $data = EkParser::replaceDashes((object)$data);
        $response = new Request($data);

        return $response;

    }

    public function validateEntity($dataAttribute)
    {
        $rules = Config::get("ValidationBoilerPlate.login.validation_rules");


        $validation = $this->commonService->validatePayload($dataAttribute->all(), $rules);

        if ($validation !== null) {
            throw new HttpResponseException(
                $this->commonService->errorUnprocessableMultipleEntity($validation)
            );
        }
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }


}
