<?php

namespace Roketin\Immune\Exceptions;

use Exception;

use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use GuzzleHttp;

class ReportHandler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {   
        if ($this->shouldReport($exception)){
            $this->sendException($exception,$request);
        }
        return parent::render($request, $exception);
    }

    /**
     * send the exception to database
     *
     * @param Exception                $exception
     * @param \Illuminate\Http\Request $request
     */
    protected function sendException(Exception $exception,$request)
    {
        $this->client = new GuzzleHttp\Client();
        try{
            $data = $this->client->post(config('lumenEmailExceptions.sendReport.API_Url'),
            ['form_params'=>['env'=>env('APP_ENV','unknown'), 'req_payload'=>$request->getContent(),'app_url'=>env('APP_URL','unknown'),
            'full_url'=>$request->fullUrl(),'exc_class'=>get_class($exception),'exc_msg'=>$exception->getMessage(),'exc_code'=>$exception->getCode(),'exc_file'=>$exception->getFile(),'exc_line'=>$exception->getLine(),'stack_trace'=>$exception->getTraceAsString()]]);
        }catch(GuzzleHttp\Exception\RequestException $e){
              return json_decode($e->getMessage());
        }
    }      
}