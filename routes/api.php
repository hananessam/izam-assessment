<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', LoginController::class . '@login')->name('auth.login');
    Route::post('/logout', LoginController::class . '@logout')->name('auth.logout');
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::get('/refresh-token', \App\Http\Controllers\Auth\AuthController::class . '@refreshToken')->name('auth.refresh-token');
    });

    Route::group(['prefix' => 'cart'], function () {
        Route::get('/', \App\Http\Controllers\CartController::class . '@index')->name('cart.index');
        Route::post('/add', \App\Http\Controllers\CartController::class . '@add')->name('cart.add');
        Route::post('/remove', \App\Http\Controllers\CartController::class . '@remove')->name('cart.remove');
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', \App\Http\Controllers\ProductController::class . '@index')->name('products.index');
    });
});