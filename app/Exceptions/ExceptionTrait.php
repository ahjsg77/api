<?php

namespace App\Exceptions;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
    public function apiException($request,$e)
    {
        if ($this->isModel($e)) {
            return $this->modelResponse();
        }
        if ($this->isHttp($e)) {
            return $this->httpResponse();
        }

        return parent::render($request, $e);
    }

    protected function isModel($e)
    {
        return $e instanceof ModelNotFoundException;
    }

    protected function modelResponse()
    {
        return response()->json([
            "errors" => "Product model Not Found"
        ], Response::HTTP_NOT_FOUND);
    }

    protected function isHttp($e)
    {
        return $e instanceof NotFoundHttpException;
    }

    protected function httpResponse()
    {
        return response()->json([
            "errors" => "Incorrect route"
        ], Response::HTTP_NOT_FOUND);
    }
}

?>