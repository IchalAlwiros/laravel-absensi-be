<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Response;

class ResponseHelper
{
    // Method to send success response
    public static function sendSuccessResponse($message, $data)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], Response::HTTP_OK);
    }

    // Method to send error response
    public static function sendErrorResponse($error, $data = [], $code = Response::HTTP_NOT_FOUND)
    {
        return response()->json([
            'success' => false,
            'error' => $error,
            'data' => $data,
        ], $code);
    }
}
