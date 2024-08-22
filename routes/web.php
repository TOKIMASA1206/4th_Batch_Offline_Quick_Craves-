<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(["middleware" => "auth"], function(){

    Route::get('/profile',[ProfileController::class, 'index'])->name('profile_index');
    Route::get('/cart',[CartController::class, 'index'])->name('cart_index');

});