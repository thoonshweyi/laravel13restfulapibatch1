<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::prefix("v1")->group(function (Request $request) {
    Route::get('/health',function(){

    });
});

// api/v1/health