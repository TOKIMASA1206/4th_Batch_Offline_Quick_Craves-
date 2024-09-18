<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProceedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\WalletController;
use App\Models\Point_Purchases;
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




    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function() {

        Route::get('/dashboard', [AdminController::class, 'index'])->name('index');

        /**  Category  */
        Route::resource('category', CategoryController::class);

        /**  Voucher  */
        Route::resource('voucher', VoucherController::class);

        /**  Proceed  */
        Route::get('/proceed',[ProceedController::class, 'adminIndex'])->name('proceed.index');

        /**  User  */
        Route::resource('user',UserController::class);

        /**  Menu Item  */
        Route::resource('menu-item', MenuItemController::class);

         /**  Point  */
        Route::resource('point',PointController::class);
    });

});
