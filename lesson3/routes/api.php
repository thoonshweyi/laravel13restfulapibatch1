<?php

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;


Route::prefix("v1")->group(function () :void {
    Route::get('/health',function():JsonResponse{
        return response()->json([
            'success'=>true,
            'message' => "API is running",
            'data' => [
                'service' => 'e-commerce-api',
                'version' => 'v1',
                'time' => now()->toIso8601String()
            ]
        ]);
    });
});

// api/v1/health