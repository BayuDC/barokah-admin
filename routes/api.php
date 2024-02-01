<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);

Route::prefix('/auth')->middleware('web')->group(function () {
    Route::get('/google', [AuthController::class, 'googleRedirect']);
    Route::get('/google/callback', [AuthController::class, 'googleCallback']);
    Route::get('/discord', [AuthController::class, 'discordRedirect']);
    Route::get('/discord/callback', [AuthController::class, 'discordCallback']);
});
Route::middleware('auth:api')->group(function () {
    Route::get('/auth/me', [AuthController::class, 'index']);
    Route::get('/cart/products', [CartController::class, 'index']);
    Route::patch('/cart/products', [CartController::class, 'update']);
});
