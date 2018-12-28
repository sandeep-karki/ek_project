<?php

namespace App\Http\Controllers\Api\V1;

use App\Exceptions\Api\HandleOAuthErrorsException;
use App\Helper\Ekcms\EkHelper;
use App\Http\Requests\JsonValidationRequest;
use App\Model\Api\V1\ApiUser;
use App\Transformers\ProfileTransformer;
use Dingo\Api\Auth\Auth;
use Illuminate\Http\Response;
use OAuthException;
use App\Services\ConstantApiMessageService;
use App\Services\ConstantCodeService;
use App\Services\ConstantStatusService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Serializer\JsonApiSerializer;
use League\OAuth2\Server\AuthorizationServer;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response as Psr7Response;
use Validator;
use Config;
use DB;
use Illuminate\Validation\Factory as ValidationFactory;
use App\Http\Controllers\Controller;

/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   schemes={"http","https"},
 *   host="",
 *   @SWG\Info(
 *     title="EKCMS",
 *     version="v1"
 *   )
 * )
 */

/** @SWG\SecurityScheme(
 *  securityDefinition = "api_key",
 *  type = "apiKey",
 *  in = "header",
 *  name = "Authorization"
 *  )
 */

class AuthController extends Controller
{

    protected $request;

    protected $server;
    protected $validationFactory;

    public function __construct(ServerRequestInterface $request, AuthorizationServer $server, ValidationFactory $validationFactory)
    {
        $this->serverRequest = $request;
        $this->apiUser = new ApiUser();
        $this->server = $server;
        $this->jsonValidationRequest = new JsonValidationRequest();
        $this->validationFactory = $validationFactory;
        $this->storeUserTransformer = new ProfileTransformer();
        $this->manager = new Manager();
        $this->error = new HandleOAuthErrorsException();

    }



    /**
     * @SWG\Post(
     *     path="/auth/login",
     *     tags={"Login"},
     *     operationId="login",
     *     summary="User Login",
     *     description="",
     *     consumes={"application/json", "application/xml"},
     *     produces={"application/xml", "application/json"},
     *     @SWG\Parameter(
     *     name="client_id",
     *     in="formData",
     *     description="Client Id",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Parameter(
     *     name="client_secret",
     *     in="formData",
     *     description="Client Secret",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Parameter(
     *     name="grant_type",
     *     in="formData",
     *     description="Grant Type password or refresh_token",
     *     required=true,
     *     type="string"
     *   ),
     *  @SWG\Parameter(
     *     name="username",
     *     in="formData",
     *     description="Login Username",
     *     required=true,
     *     type="string"
     *   ),
     *  @SWG\Parameter(
     *     name="password",
     *     in="formData",
     *     description="Login Password",
     *     required=true,
     *     type="string"
     *   ),
     *     @SWG\Parameter(
     *     name="scope",
     *     in="formData",
     *     description="Scope",
     *     required=false,
     *     type="string"
     *   ),
     *     @SWG\Parameter(
     *     name="refresh_token",
     *     in="formData",
     *     description="refresh_token",
     *     required=false,
     *     type="string"
     *   ),
     *     @SWG\Response(
     *         response=401,
     *         description="unsupported grant type",
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Required json Parameter",
     *     )
     * )
     */
    public function login(Request $request)
    {
        $userData     = $request->json()->all();

        if (empty($userData) == true) {
            $userData = $request->all();
        }

        if (empty($userData) == true) return $this->emptyValidation();

//        if (!isset($userData['client_type'])) {
//            $code = ConstantCodeService::CLIENTTYPECODEREQUIRED;
//            $key = 'client-type-required';
//            $message = ConstantApiMessageService::CLIENTYPERRORREQUIRED;
//            $title = ConstantApiMessageService::CLIENTYPERRORREQUIRED;
//            $error = $this->jsonValidationRequest->missingDataAttribute(
//                null, $code, $key, $message, $title);
//
//            return response()->json(
//                $error, ConstantStatusService::UNPROCESSABLEENTITY);
//        }

        if  ($userData['grant_type'] == 'refresh_token') {
            $validator = Validator::make($userData, Config::get('boilerplate.refresh_token.validation_rules'));
        } elseif ($userData['grant_type'] == 'password') {

                $validator = Validator::make($userData, Config::get('boilerplate.login.validation_rules'),
                    ["username.required"=>"Email is required!","username.email"=>"Email must be valid!"]);

                if ($validator->fails()) {

                    return EkHelper::jsonValidation($validator);
                }


                $userCheck = $this->apiUser->whereEmail($userData['username'])
                    ->first();






        $responseData = $this->error->withErrorHandling(function () use ($userData) {
            return $this->server->respondToAccessTokenRequest($this->serverRequest->withParsedBody($userData), new Psr7Response);
        });

        if ($responseData->getStatusCode() == ConstantStatusService::INTERNALSERVERERROR) {
            if ($responseData->getContent() == ConstantApiMessageService::ALREADYLOGGEDINMESSAGE) {
                $code = ConstantCodeService::ALREADYLOGGEDIN;
                $key = 'logged-in';
                $message = $responseData->getContent();
                $title = ConstantApiMessageService::ALREADYLOGGEDIN;
                $error = $this->jsonValidationRequest->missingDataAttribute(null, $code, $key, $message, $title);
                return response()->json($error, ConstantStatusService::UNAUTHORIZEDSTATUS);
            } elseif ($responseData->getContent() == ConstantApiMessageService::NOTACTIVATED) {
                $code = ConstantCodeService::NOTACTIVATED;
                $key = 'logged-in';
                $message = $responseData->getContent();
                $title =ConstantApiMessageService::NOTACTIVATEDSTATUS;
                $error = $this->jsonValidationRequest->missingDataAttribute(null, $code, $key, $message, $title);
                return response()->json($error, ConstantStatusService::UNAUTHORIZEDSTATUS);
            } elseif ($responseData->getContent() == ConstantApiMessageService::BLOCKEDMESSAGE) {
                $code = ConstantCodeService::BLOCKED;
                $key = 'logged-in';
                $message = $responseData->getContent();
                $title = ConstantApiMessageService::BLOCKED;
                $error = $this->jsonValidationRequest->missingDataAttribute(null, $code, $key, $message, $title);
                return response()->json($error, ConstantStatusService::UNAUTHORIZEDSTATUS);
            }

        } elseif ($responseData->getStatusCode() == ConstantStatusService::UNAUTHORIZEDSTATUS) {
            $response = json_decode((string)$responseData->getBody(), true);

            $code = ConstantCodeService::ALREADYLOGGEDIN;
            $key = 'logged-in';
            $message = $response['message'];
            $title = $response['error'];
            $error = $this->jsonValidationRequest->missingDataAttribute(null, $code, $key, $message, $title);
            return response()->json($error, ConstantStatusService::UNAUTHORIZEDSTATUS);


        } elseif ($responseData->getStatusCode() == ConstantStatusService::BADREQUEST) {
            $response = json_decode((string)$responseData->getBody(), true);
            $code = ConstantCodeService::ALREADYLOGGEDIN;
            $key = 'refresh-token';
            $message = $response['message'];
            $title = $response['error'];
            $error = $this->jsonValidationRequest->missingDataAttribute(null, $code, $key, $message, $title);
            return response()->json($error, ConstantStatusService::UNAUTHORIZEDSTATUS);
        } elseif ($responseData->getStatusCode() == ConstantStatusService::OKSTATUS) {

            return $responseData;
        }
    }
    }

    public function emptyValidation()
    {
        $message = ConstantApiMessageService::JSONPARSEERROR;
        $status = ConstantStatusService::BADREQUEST;
        $error = $this->jsonValidationRequest->missingDataAttribute($status, null, null, $message);
        return response()->json($error, $status);

    }

    public function jsonValidation($validator, $titleMessage = null)
    {
        $errorData = array();

        foreach ($validator->errors()->toArray() as $key => $value) {
            $pointer = 'pointer';

            foreach ($value as $v) {
                $jsonErrorMessage['code'] = mt_rand( 100, 999 ); ;
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

        $jsonVersion['version'] = (string)1.0;
        $errors['jsonapi'] = $jsonVersion;
        $errors['errors'] = $errorData;

        return response()->json($errors, ConstantStatusService::UNPROCESSABLEENTITY);
    }
}
