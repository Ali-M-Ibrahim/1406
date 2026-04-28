<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponse
{
    public function successResponse($data = null, $message = null, $code = Response::HTTP_OK)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
    ]);
    }
    public function errorResponse($message = null, $code = Response::HTTP_INTERNAL_SERVER_ERROR){
        return response()->json([
            'success' => false,
            'message' => $message,
        ]);
    }
}
