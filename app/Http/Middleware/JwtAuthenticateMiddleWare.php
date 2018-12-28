<?php

namespace App\Http\Middleware;

use App\Services\CommonService;
use App\Services\ConstantApiMessageService;
use App\Services\ConstantStatusService;
use Closure;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\JWTAuth;
use DB;

class JwtAuthenticateMiddleWare
{
    protected $auth;

    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
        $this->commonService = new CommonService();

    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! $this->auth->parser()->setRequest($request)->hasToken()) {
            throw new UnauthorizedHttpException('jwt-auth', 'Token not provided');
        }
        try {
            if (! $this->auth->parseToken()->authenticate()) {
                throw new UnauthorizedHttpException('jwt-auth', 'User not found');
            } else {
                $request->user = $this->auth->parseToken()->authenticate();
                return $next($request);
            }
        } catch (TokenExpiredException $e) {
             $error['error']='token_expired';
                $error['message']=$e->getMessage();
                return $this->commonService->errorCustomError($error, $titleMessage = null,ConstantStatusService::BADREQUEST)  ;

        } catch (TokenInvalidException $e) {
                $error['error']='token_invalid';
                $error['message']=$e->getMessage();
                return $this->commonService->errorCustomError($error, $titleMessage = null,ConstantStatusService::BADREQUEST) ;

        } catch (JWTException $e) {
            $error['error']='token_absent';
            $error['message']=$e->getMessage();
            return $this->commonService->errorCustomError($error, $titleMessage = null,ConstantStatusService::BADREQUEST)  ;
        }

        }
}
