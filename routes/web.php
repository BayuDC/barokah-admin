<?php

use App\Livewire\ProductCreate;
use App\Livewire\ProductTable;
use App\Livewire\Home;
use App\Livewire\ProductUpdate;
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
    Route::get('/', Home::class);
    Route::get('/products', ProductTable::class);
    Route::get('/products/create', ProductCreate::class);
    Route::get('/products/update/{product}', ProductUpdate::class);
});
