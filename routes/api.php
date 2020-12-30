<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OrderController;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/customer')->group( function() {
    Route::post('/store', [CustomerController::class, 'store']);
    Route::post('/check', [CustomerController::class, 'check']);
    Route::get('/orders/{id}', [CustomerController::class, 'getOrders']);
    Route::get('/{id}', [CustomerController::class, 'show']);
});

Route::prefix('/seller')->group( function() {
    Route::get('/index', [SellerController::class, 'index']);
    Route::post('/store', [SellerController::class, 'store']);
    Route::post('/check', [SellerController::class, 'check']);
    Route::get('/foods/{id}', [SellerController::class, 'getFoods']);
    Route::get('/{id}', [SellerController::class, 'show']);
});

Route::prefix('/food')->group( function() {
    Route::get('/index', [FoodController::class, 'index']);
    Route::post('/store', [FoodController::class, 'store']);
    Route::get('/{id}', [FoodController::class, 'show']);
    Route::put('/{id}', [FoodController::class, 'update']);
    Route::delete('/{id}', [FoodController::class, 'destroy']);
});

Route::prefix('/order')->group( function() {
    Route::post('/store', [OrderController::class, 'store']);
});