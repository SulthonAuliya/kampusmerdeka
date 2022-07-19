<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class BaseController extends Controller
{
    public function SendResponse($result, $message){
        $reponse = [
            'success'   => true,
            'data'      => $result,
            'message'   => $message
        ];

        return response()->json($reponse, 200);
    } 

    public function SendError($error, $errorMessages = [], $code = 404){
        $response = [
            'success'   => false,
            'message'   => $error
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
