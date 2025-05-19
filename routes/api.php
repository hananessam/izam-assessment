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

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', \App\Http\Controllers\ProductController::class . '@index')->name('products.index');
    });
});