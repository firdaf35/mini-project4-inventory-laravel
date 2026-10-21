<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockTransactionController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.post');
});

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // Admin dan Owner boleh melihat dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Admin dan Owner boleh melihat data bunga
    Route::get('/products', [ProductController::class, 'index'])
        ->name('products.index');

    Route::get('/products/{product}', [ProductController::class, 'show'])
        ->whereNumber('product')
        ->name('products.show');

    // Hanya Admin boleh mengelola produk dan kategori
    Route::middleware('role:admin')->group(function () {

        Route::resource('categories', CategoryController::class)
            ->except(['show']);

        Route::resource('products', ProductController::class)
            ->except(['index', 'show']);

        // Hanya Admin boleh mencatat barang masuk/keluar
        Route::get('/stock/create', [StockTransactionController::class, 'create'])
            ->name('stock.create');

        Route::post('/stock', [StockTransactionController::class, 'store'])
            ->name('stock.store');
    });

    // Admin dan Owner boleh melihat histori stok
    Route::get('/stock', [StockTransactionController::class, 'index'])
        ->name('stock.index');
});