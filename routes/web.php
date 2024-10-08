<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PointPurchaseController;
use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\ProceedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\MenuOptionController;
use App\Http\Controllers\MenuSizeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

Auth::routes();



Route::group(["middleware" => "auth"], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    # PROFILE
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile_index');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile_update');
    Route::patch('/profile/password', [ProfileController::class, 'passwordUpdate'])->name('profile_password_update');

    # Menu Modal Route
    Route::get('/load-menu-modal{menuId}', [HomeController::class, 'loadMenuModal'])->name('load-menu-modal');

    // Add to Cart Route
    Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
    Route::get('cart-product-remove/{rowId}', [CartController::class, 'cartProductRemove'])->name('cart-product-remove');

    #CART
    Route::get('/cart', [CartController::class, 'index'])->name('cart_index');
    Route::post('/cart-update-qty', [CartController::class, 'cartQtyUpdate'])->name('cart.quantity-update');
    Route::post('/apply-voucher', [CartController::class, 'applyVoucher'])->name('apply-voucher');
    Route::post('/remove-voucher', [CartController::class, 'removeVoucher'])->name('remove-voucher');
    Route::get('/cart-destroy', [CartController::class, 'cartDestroy'])->name('cart.destroy');

    /** Payment Routes  */
    Route::post('make-payment', [PaymentController::class, 'makePayment'])->name('make-payment');
    Route::get('payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('payment-cancel', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');

    /** Paypal Routes */
    Route::get('paypal/payment', [PaymentController::class, 'payWithPaypal'])->name('paypal.payment');
    Route::get('paypal/success', [PaymentController::class, 'paypalSuccess'])->name('paypal.success');
    Route::get('paypal/cancel', [PaymentController::class, 'paypalCancel'])->name('paypal.cancel');



    /** Point Routes */
    Route::post('point/payment', [PaymentController::class, 'payWithPoints'])->name('point.payment');


    /** Point Purchase Routes (ポイント購入用) */
    Route::post('make-point-payment', [PointPurchaseController::class, 'makePayment'])->name('make-point-payment');
    Route::get('point/payment-success', [PointPurchaseController::class, 'paymentSuccess'])->name('point.payment.success');
    Route::get('point/payment-cancel', [PointPurchaseController::class, 'paymentCancel'])->name('point.payment.cancel');

    /** PayPal Routes for Point Purchase (ポイント購入用のPayPalルート) */
    Route::get('paypal/point/payment', [PointPurchaseController::class, 'payWithPaypalPoints'])->name('paypal.point.payment');
    Route::get('paypal/point/success', [PointPurchaseController::class, 'paypalSuccess'])->name('paypal.point.success');
    Route::get('paypal/point/cancel', [PointPurchaseController::class, 'paypalCancel'])->name('paypal.point.cancel');


    #PROCEED
    Route::get('/proceed', [ProceedController::class, 'index'])->name('proceed_index');

    #WALLET
    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet.index');
    Route::post('/wallet/point/store', [WalletController::class, 'pointStore'])->name('wallet.point.store');

    #SEARCH
    Route::get('/menu-items/search', [HomeController::class, 'search'])->name('menu-items.search');




/**================== Admin Side ============================== */

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {

        Route::get('/dashboard', [AdminController::class, 'index'])->name('index');

        /** ==================== Menu ========================== */

        /**  Category  */
        Route::resource('category', CategoryController::class);

        /**  Menu Item  */
        Route::resource('menu-item', MenuItemController::class);

        /**  Menu Sizes & Options  */
        Route::resource('menuSize', MenuSizeController::class);
        Route::resource('menuOption', MenuOptionController::class);

        /**  Voucher  */
        Route::resource('voucher', VoucherController::class);

        /**  Proceed  */
        Route::get('/proceed', [ProceedController::class, 'adminIndex'])->name('proceed.index');
        Route::patch('/proceed/{id}/update', [ProceedController::class, 'update'])->name('proceed.update');

        /**  User  */
        Route::patch('/user/{id}/activate', [UserController::class, 'activate'])->name('user.activate');

        Route::resource('user', UserController::class);

        /**  Point  */
        Route::resource('point', PointController::class);

        Route::post('/orders/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
    });
});
