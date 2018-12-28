<?php

namespace App\Exceptions;


use App\Traits\Exception\ExceptionHandlerTrait;
use Exception;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\SeekException;
use GuzzleHttp\Exception\TransferException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    use ExceptionHandlerTrait;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $exception
     * @return void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param Exception $exception
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $exception)
    {

        if($this->isHttpException($exception)){

            if ($exception->getStatusCode() == 429) {
                $exceptionHeaders = $exception->getHeaders();
                $retryPeriod = $exceptionHeaders["Retry-After"];

                $retryMinute = (int)floor(($retryPeriod / 60));
                $retrySeconds = $retryPeriod % 60;

                $minutes = $retryMinute == 0 ? '' : " " . $retryMinute . " minutes";
                $seconds = $retrySeconds == 0 ? '' : " " . $retrySeconds . " seconds";

                $errorMsg = $exception->getMessage() . ".Please Retry after" . $minutes . $seconds;

                return redirect(PREFIX . '/login')->withErrors(['alert-danger' => $errorMsg]);
            }
        }

        if ($exception instanceof RolesDeniedException) {

            echo '<h1>Unauthorized Access</h1>';
            exit();

        }

        if ($request->isJson()) {
            if ($exception instanceof ModelNotFoundException) {
                return $this->handleException("Item not found!",422,'item_not_found');
            }

            if ($exception instanceof NotFoundHttpException) {
                return response()->view("errors.invalid_token", ['exception' => $exception], 401);
            }
            if ($exception instanceof ClientException) {
                return $this->handleGuzzleException($exception);
            }
            if ($exception instanceof BadResponseException) {
                return $this->handleGuzzleException($exception);
            }
            if ($exception instanceof ConnectException) {
                return $this->handleGuzzleException($exception);
            }
            if ($exception instanceof RequestException) {
                return $this->handleGuzzleException($exception);
            }
            if ($exception instanceof SeekException) {
                return $this->handleGuzzleException($exception);
            }
            if ($exception instanceof TransferException) {
                return $this->handleGuzzleException($exception);
            }
            if ($exception instanceof \Exception) {
                return $this->handleException($exception);
            }
        }
        return parent::render($request, $exception);
    }

}
