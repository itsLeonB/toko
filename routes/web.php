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
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/inventory', function () {
        return view('inventory');
    })->name('inventory');

    Route::get('/accounts', function () {
        return view('accounts');
    })->name('accounts');

    Route::get('/purchases', function () {
        return view('purchases');
    })->name('purchases');

    Route::get('/sales', function () {
        return view('sales');
    })->name('sales');

    Route::resources([
        'products' => ProductController::class,
    ]);
});
