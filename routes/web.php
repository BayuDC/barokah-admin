<?php

use App\Livewire\Home;
use App\Livewire\CategoryCreate;
use App\Livewire\CategoryTable;
use App\Livewire\CategoryUpdate;
use App\Livewire\ProductCreate;
use App\Livewire\ProductTable;
use App\Livewire\ProductUpdate;
use App\Livewire\StockTable;
use App\Livewire\UserDetail;
use App\Livewire\UserTable;
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
    Route::get('/products/stocks', StockTable::class);

    Route::get('/categories', CategoryTable::class);
    Route::get('/categories/create', CategoryCreate::class);
    Route::get('/categories/update/{category}', CategoryUpdate::class);

    Route::get('/users', UserTable::class);
    Route::get('/users/{user}', UserDetail::class);
});
