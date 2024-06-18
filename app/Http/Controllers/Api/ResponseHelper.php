<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Response;

class ResponseHelper
{
    // Method to send success response
    public static function sendSuccessResponse($message, $data)
    {
        $responseData = [
            'success' => true,
            'message' => $message,
        ];


        if ($data !== null) {
            $responseData['data'] = $data;
        }

        return response()->json($responseData, Response::HTTP_OK);
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
