<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

abstract class ApiController extends Controller
{
    public function succesResponse(
        mixed $data = null, // array, object, string, number, null
        string $message = "Request completed successfully.",
        int $status= Response::HTTP_OK,
        array $meta = [] // prepare for pagination info
    ):JsonResponse{
        $body = [
            'success'=>true,
            'message'=> $message,
            'data'=> $data
        ];

        if($meta !== []){
            $body['meta'] = $meta;
        }

        return response()->json($body,$status);
    }

    public function errorResponse(
        string $message,
        array $errors = []
    ):JsonResponse{
        return response()->json([
            'success' => false,
            'message' =>  $message,
            'data' => null,
            'errors' => $errors
        ],);
    }
}
