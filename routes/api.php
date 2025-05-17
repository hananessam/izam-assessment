<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'products'], function () {
    Route::get('/', \App\Http\Controllers\ProductController::class . '@index')->name('products.index');
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', LoginController::class . '@login')->name('auth.login');
    Route::post('/logout', LoginController::class . '@logout')->name('auth.logout');
});