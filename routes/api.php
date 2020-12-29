<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SellerController;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/customer')->group( function() {
    Route::post('/store', [CustomerController::class, 'store']);
});

Route::prefix('/seller')->group( function() {
    Route::post('/store', [SellerController::class, 'store']);
});