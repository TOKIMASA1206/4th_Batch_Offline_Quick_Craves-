<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProceedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

Auth::routes();



Route::group(["middleware" => "auth"], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    # PROFILE
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile_index');

    #CART
    Route::get('/cart', [CartController::class, 'index'])->name('cart_index');

    #PROCEED
    Route::get('/proceed',[ProceedController::class, 'index'])->name('proceed_index');

    #WALLET
    Route::get('wallet', [WalletController::class, 'index'])->name('wallet.index');

    #ADMIN
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('index');
});
