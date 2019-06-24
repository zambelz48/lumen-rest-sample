<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected function successResponse($response, $statusCode)
    {
        $successResponse = [
            'data' => $response
        ];

        return response()->json($successResponse, $statusCode);
    }

    protected function errorResponse($errorInfo, $statusCode)
    {
        $errorResponse = [
            'error' => [
                'code' => $errorInfo['code'],
                'message' => $errorInfo['message']
            ]
        ];

        return response()->json($errorResponse, $statusCode);
    }

}
