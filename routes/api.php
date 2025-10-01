<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProdukController;
use App\Http\Controllers\API\ReviewanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/{id}', [ProdukController::class, 'show']);
Route::post('produk', [ProdukController::class, 'store'])->middleware('auth:sanctum');
Route::patch('produk/{id}', [ProdukController::class, 'update'])->middleware('auth:sanctum');
Route::delete('produk/{id}', [ProdukController::class, 'destroy'])->middleware('auth:sanctum');

Route::get('/review', [ReviewanController::class, 'index']);
Route::get('/review/{id}', [ReviewanController::class, 'show']);
Route::post('/review', [ReviewanController::class, 'store'])->middleware('auth:sanctum');
Route::patch('/review/{id}', [ReviewanController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/review/{id}', [ReviewanController::class, 'destroy'])->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
