<?php

use App\Livewire\Home;
use App\Livewire\CategoryCreate;
use App\Livewire\CategoryTable;
use App\Livewire\CategoryUpdate;
use App\Livewire\Login;
use App\Livewire\ProductCreate;
use App\Livewire\ProductTable;
use App\Livewire\ProductUpdate;
use App\Livewire\Password;
use App\Livewire\ProfileDetail;
use App\Livewire\ProfileUpdate;
use App\Livewire\StockTable;
use App\Livewire\TransactionTable;
use App\Livewire\UserDetail;
use App\Livewire\UserTable;
use App\Livewire\WorkerCreate;
use App\Livewire\WorkerDetail;
use App\Livewire\WorkerTable;
use App\Livewire\WorkerUpdate;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    Route::middleware('auth')->group(function () {
        Route::get('/', Home::class);
        Route::get('/profile', ProfileDetail::class);
        Route::get('/profile/update', ProfileUpdate::class);
        Route::get('/password', Password::class);

        Route::get('/products', ProductTable::class);
        Route::get('/products/create', ProductCreate::class);
        Route::get('/products/update/{product}', ProductUpdate::class);
        Route::get('/products/stocks', StockTable::class);

        Route::get('/categories', CategoryTable::class);
        Route::get('/categories/create', CategoryCreate::class);
        Route::get('/categories/update/{category}', CategoryUpdate::class);

        Route::get('/transactions', TransactionTable::class);

        Route::get('/users', UserTable::class);
        Route::get('/users/{user}', UserDetail::class);

        Route::get('/workers', WorkerTable::class);
        Route::get('/workers/create', WorkerCreate::class);
        Route::get('/workers/update/{user}', WorkerUpdate::class);
        Route::get('/workers/{user}', WorkerDetail::class);

        Route::get('/logout', function () {
            Auth::logout();
            return redirect('/admin/login');
        });
    });

    Route::get('/login', Login::class)
        ->name('login')
        ->middleware('guest');
});
