<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::apiResource('product',ProductController::class);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('add-product', [ProductController::class, 'store']);
Route::put('update-product', [ProductController::class, 'update']);
Route::get('show-product/{id}', [ProductController::class, 'show']);
Route::get('show-product', [ProductController::class, 'showAllProduct']);
Route::delete('delete-product', [ProductController::class, 'destroy']);
Route::delete('delete-product/{id}', [ProductController::class, 'delete']);

