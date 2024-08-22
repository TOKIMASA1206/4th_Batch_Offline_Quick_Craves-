<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Auth::routes();



Route::group(["middleware" => "auth"], function(){

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile',[ProfileController::class, 'index'])->name('profile_index');
    Route::get('/cart',[CartController::class, 'index'])->name('cart_index');

    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('index');
});
