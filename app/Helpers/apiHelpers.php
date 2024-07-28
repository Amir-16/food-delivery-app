<?php

if (! function_exists('successResponse')) {
    function successResponse($data = null, $message = null, $code = 200)
    {
        return response()->json([
            'status' => 1,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

}

if (! function_exists('errorResponse')) {
    function errorResponse($data = null, $message = null, $code = 400)
    {
        return response()->json([
            'status' => 0,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

}
