<?php

namespace App\Traits;

use App\Bridge\ClientRepository;
use App\Model\Api\V1\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use League\Event\EmitterAwareTrait;
use League\OAuth2\Server\CryptTrait;
use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Exception\OAuthServerException;
use League\OAuth2\Server\Repositories\ClientRepositoryInterface;
use League\OAuth2\Server\RequestEvent;
use Psr\Http\Message\ServerRequestInterface;

trait ValidateClient
{
    use EmitterAwareTrait, CryptTrait;

    /**
     * @var ClientRepositoryInterface
     */
    protected $clientRepository;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function setClientRepository(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validateClient(Request $request)
    {


        $clientId = $this->client->where('id',$request->client_id)->first();

        $clientSecret = $this->client->checkClientSecret($request->client_secret);

        if (is_null($clientId)) {
            throw OAuthServerException::invalidClient('client_id');
        } elseif (is_null($clientSecret)) {
            throw OAuthServerException::invalidClient('client_secret');
        } else {
            return true;
        }


    }

    protected function getRequestParameter($parameter, ServerRequestInterface $request, $default = null)
    {
        $requestParameters = (array) $request->getParsedBody();

        return isset($requestParameters[$parameter]) ? $requestParameters[$parameter] : $default;
    }

    protected function getBasicAuthCredentials(ServerRequestInterface $request)
    {
        if (!$request->hasHeader('Authorization')) {
            return [null, null];
        }

        $header = $request->getHeader('Authorization')[0];
        if (strpos($header, 'Basic ') !== 0) {
            return [null, null];
        }

        if (!($decoded = base64_decode(substr($header, 6)))) {
            return [null, null];
        }

        if (strpos($decoded, ':') === false) {
            return [null, null]; // HTTP Basic header without colon isn't valid
        }

        return explode(':', $decoded, 2);
    }

    protected function getServerParameter($parameter, ServerRequestInterface $request, $default = null)
    {
        return isset($request->getServerParams()[$parameter]) ? $request->getServerParams()[$parameter] : $default;
    }

    public function getIdentifier()
    {
        return 'client_credentials';
    }




}
