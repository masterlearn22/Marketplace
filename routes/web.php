<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost']);
Route::get('/register', [PageController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/katalog', [PageController::class, 'katalog'])->name('katalog');
Route::get('/produk/{id}', [PageController::class, 'produk'])->name('produk.detail');

Route::get('/keranjang', [CartController::class, 'index'])->name('keranjang');
Route::post('/keranjang/add/{id}', [CartController::class, 'add'])->name('keranjang.add');
Route::post('/keranjang/remove/{id}', [CartController::class, 'remove'])->name('keranjang.remove');

Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');
    
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::post('/orders/upload/{id}', [OrderController::class, 'uploadPayment'])->name('orders.upload');
    Route::post('/orders/status/{id}', [OrderController::class, 'updateStatus'])->name('orders.status');

    Route::get('/products', [PageController::class, 'products'])->name('products');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::post('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::post('/products/delete/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
});
