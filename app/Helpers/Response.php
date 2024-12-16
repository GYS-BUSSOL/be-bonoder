<?php 

namespace App\Helpers;

class Response {
    public static function success($message = ' ', $data) {
        return response()->json([
            'status' => 200,
            'message' =>'Success get'.  $message,
            'data' => $data
        ], 200);
    }
    public static function error($message = ' ', $data) {
        return response()->json([
            'status' => 400,
            'message' =>'Error get'.  $message,
            'data' => $data
        ], 400);
    }
    public static function notFound($message = ' ') {
        return response()->json([
            'status' => 404,
            'message' =>'Not Found'.  $message
        ], 404);
    }
    public static function trow500($message) {
        return response()->json([
            'status' => 500,
            'message' => $message
        ], 500);
    }
}