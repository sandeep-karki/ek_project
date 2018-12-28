<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers;
use App\Profile;
use App\Services\CommonService;
use App\Services\ConstantService;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use App\User;
use Response;
use JWTAuth;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;


class FacebookController extends Controllers\Controller
{
    /**
     * The base Facebook Graph URL.
     *
     * @var string
     */
    /**
     * Create a new provider instance.
     *
     * @param  Request $request
     * @param  string $clientId
     * @param  string $clientSecret
     * @param  string $redirectUrl
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->clientId = config('services.facebook.client_id');
        $this->redirectUrl = config('services.facebook.redirect');
        $this->clientSecret = config('services.facebook.client_secret');
        $this->user = new User;
        $this->profile = new User();
        $this->commonService = new CommonService();


    }


    protected $graphUrl = 'https://graph.facebook.com';

    /**
     * The Graph API version for the request.
     *
     * @var string
     */
    protected $version = 'v2.6';

    /**
     * The user fields being requested.
     *
     * @var array
     */
    protected $fields = ['name', 'email', 'gender', 'verified'];

    /**
     * The scopes being requested.
     *
     * @var array
     */
    protected $scopes = ['email', 'public_profile'];


    /**
     * Re-request a declined permission.
     *
     * @var bool
     */
    protected $reRequest = false;


    /**
     * {@inheritdoc}
     */
    protected function getTokenUrl()
    {
        return $this->graphUrl . '/oauth/access_token';
    }

    /**
     * Get the access token for the given code.
     *
     * @param  string $code
     * @return string
     */
    public function getAccessToken(Request $request)
    {
        try {
            $code = $request->token;
            $response = $this->getHttpClient()->get($this->getTokenUrl(), [
                'query' => $this->getTokenFields($code),
            ]);

            $token = $this->parseAccessToken($response->getBody());
            $userFacebookData = $this->getUserByToken($token);
            return $userFacebookData;
        } catch (ClientException $exception) {
            $response = $exception->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            if ($responseBodyAsString) {
                $jsonDecoded = json_decode($responseBodyAsString, true);
                  $error['error']=$jsonDecoded['error']['type'];
                 $error['message']=$jsonDecoded['error']['message'];
               throw new HttpResponseException($this->commonService->errorCustomError($error, $titleMessage = null,$response->getStatusCode()))  ;
            }
        }


    }

    protected function getTokenFields($code)
    {
        return [
            'client_id' => $this->clientId, 'client_secret' => $this->clientSecret,
            'code' => $code, 'redirect_uri' => $this->redirectUrl,
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function parseAccessToken($body)
    {
        parse_str($body);

        return $access_token;
    }

    /**
     * {@inheritdoc}
     */
    protected function getUserByToken($token)
    {
        $appSecretProof = hash_hmac('sha256', $token, $this->clientSecret);
        $response = $this->getHttpClient()->get($this->graphUrl . '/' . $this->version . '/me?access_token=' . $token . '&fields=' . implode(',', $this->fields), [
            'headers' => [
                'Accept' => 'application/json',
            ],
        ]);
        $user = json_decode($response->getBody(), true);
        $avatarUrl = $this->graphUrl . '/' . $this->version . '/' . $user['id'] . '/picture?height=200&width=200';
        $user['profile_picture'] = $avatarUrl;
        $user['type'] = 'facebook';
        return $user;
    }


    public function dateTime()
    {
        $dateTime = Carbon::now('Asia/Kathmandu');
        return $dateTime->toDateTimeString();
    }

    /**
     * {@inheritdoc}
     */
    protected function mapUserToObject(array $user)
    {
        $avatarUrl = $this->graphUrl . '/' . $this->version . '/' . $user['id'] . '/picture';

        return (new User)->setRaw($user)->map([
            'id' => $user['id'], 'nickname' => null, 'name' => isset($user['name']) ? $user['name'] : null,
            'email' => isset($user['email']) ? $user['email'] : null, 'avatar' => $avatarUrl . '?type=normal',
            'avatar_original' => $avatarUrl . '?width=1920',
        ]);
    }


    /**
     * Set the user fields to request from Facebook.
     *
     * @param  array $fields
     * @return $this
     */
    public function fields(array $fields)
    {
        $this->fields = $fields;

        return $this;
    }


    protected function getHttpClient()
    {
        return new \GuzzleHttp\Client;
    }


}
