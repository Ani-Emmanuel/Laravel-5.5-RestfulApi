<?php namespace App\Http\Controllers;

class ApiController extends Controller{

    protected $statusCode = 200;


    public function setStatusCode($statusCode){

        $this->statusCode = $statusCode;

        return $this;
    }

    public function getStatusCode(){

        return $this->statusCode;

    }

    public function response($data, $headers = []){

        return response()->json($data, $this->getStatusCode(), $headers);

    }


    public function respondNotFound($message = "Not Found"){

        return $this->setStatusCode(404)->errorResponces($message);

    }


    public function internalError($message){

        return $this->setStatusCode(500)->errorResponces($message);
        
    }


    public function errorResponces($message){

          return $this->response([
            'error' => [
                'message' => $message,
                'status_Code' => $this->getStatusCode(),
            ]
        ]);

    }


}