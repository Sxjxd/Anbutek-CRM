<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Api\OrderApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/user/login', [\App\Http\Controllers\Api\UserController::class, 'login']);
Route::post('/user/register', [\App\Http\Controllers\Api\UserController::class, 'register']);

 // Products routes
 Route::get('/products', [ProductController::class, 'index']);
 Route::post('/products/create', [ProductController::class, 'store']);
 Route::get('/products/{id}', [ProductController::class, 'show']);
 Route::put('/products/{id}', [ProductController::class, 'update']);
 Route::delete('/products/{id}', [ProductController::class, 'destroy']);




 Route::post('orders/create', [OrderApiController::class, 'create']);
 Route::get('orders', [OrderApiController::class, 'fetch']);




