<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/admin');
});
Route::prefix('/admin')->group(function () {
    Route::view('/', 'admin/dashboard');
    Route::view('/products', 'product/index');
    Route::view('/products/create', 'product/create');
});
