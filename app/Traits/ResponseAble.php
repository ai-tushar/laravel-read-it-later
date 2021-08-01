<?php

namespace App\Traits;

use Illuminate\Http\Response as Res;
use Response;

trait ResponseAble
{
    protected $statusCode = Res::HTTP_OK;
    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
    /**
     * @param $message
     * @return json response
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function respondSuccess(array $data = [], string $message = 'Operation Successful.')
    {
        return $this->respond([
            'status' => 1,
            'status_code' => $this->getStatusCode(),
            'message' => $message,
            'data' => $data
        ]);
    }
    
    public function respondNotFound(string $message = 'Not Found!')
    {
        return $this->setStatusCode(Res::HTTP_NOT_FOUND)->respond([
            'status' => 0,
            'status_code' => Res::HTTP_NOT_FOUND,
            'message' => $message,
        ]);
    }

    public function respondInternalError(string $message = 'Operation Failed!')
    {
        return $this->setStatusCode(Res::HTTP_INTERNAL_SERVER_ERROR)->respond([
            'status' => 'error',
            'status_code' => $this->getStatusCode(),
            'message' => $message,
        ]);
    }

    public function respondWithUnauthorisedError(string $message)
    {
        return $this->setStatusCode(Res::HTTP_UNAUTHORIZED)->respond([
            'status' => 'error',
            'status_code' => $this->getStatusCode(),
            'message' => $message,
        ]);
    }

    public function respond(array $data, $headers = [])
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }
}
