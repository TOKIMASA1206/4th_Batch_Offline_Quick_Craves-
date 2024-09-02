<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProceedController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Auth::routes();



Route::group(["middleware" => "auth"], function(){

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/profile',[ProfileController::class, 'index'])->name('profile_index');
    Route::get('/cart',[CartController::class, 'index'])->name('cart_index');
    Route::get('/proceed',[ProceedController::class, 'index'])->name('proceed_index');
    Route::get('/card',[ProfileController::class, 'card'])->name('card_index');

    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('index');
});
