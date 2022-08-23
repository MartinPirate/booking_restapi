<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Throwable;
use function get_class;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
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
     * @param Exception|Throwable $exception
     * @return void
     * @throws Throwable
     */
    public function report(Exception|Throwable $exception): void
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Exception|Throwable $e
     * @return JsonResponse
     * @throws Throwable
     */
    public function render($request, Exception|Throwable $e): JsonResponse
    {
      /*  if ($request->wantsJson()) {   //add Accept: application/json in request
            return $this->handleApiException($request, $e);
        }*/

        return $this->handleApiException($request, $e);
    }

    private function handleApiException($request, Throwable $exception): JsonResponse
    {
        $exception = $this->prepareException($exception);

        if ($exception instanceof HttpResponseException) {
            $exception = $exception->getResponse();
        }

        if ($exception instanceof AuthenticationException) {
            $exception = $this->unauthenticated($request, $exception);
        }

        if ($exception instanceof ValidationException) {
            $exception = $this->convertValidationExceptionToResponse($exception, $request);
        }

        return $this->customApiResponse($exception);
    }

    private function customApiResponse($exception): JsonResponse
    {
        if (method_exists($exception, 'getStatusCode')) {
            $statusCode = $exception->getStatusCode();
        } else {
            $statusCode = 500;
        }

        $response = [];

        switch ($statusCode) {
            case 401:
                $response['message'] = 'Unauthorized';
                break;

            case 403:
                $response['message'] = 'Forbidden';
                break;

            case 404:
                $response['message'] = 'Not Found';
                break;

            case 405:
                $response['message'] = 'Method Not Allowed';
                break;

            case 422:
                $response['message'] = $exception->original['message'];
                $response['errors'] = $exception->original['errors'];
                break;

            default:
                $response['message'] = ($statusCode === 500) ? 'Whoops, looks like something went wrong' : $exception->getMessage();
                break;
        }

        $response['error'] = true;
        $response['status'] = $statusCode;

        return response()->json($response, $statusCode);
    }
}
