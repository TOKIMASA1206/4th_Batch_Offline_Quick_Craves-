<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\MenuItem;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $vouchers = Auth::user()->vouchers()->where('status', 1)->get();
        } else {
            $vouchers = collect();
        }

        return view('frontend.cart.index', compact('vouchers'));
    }

    // Add Product into cart
    function addToCart(Request $request)
    {
        $menuItem = MenuItem::findOrFail($request->menu_item_id);
        try {
            $menuSize = $menuItem->menuSizes->where('id', $request->menu_size)->first();
            $menuOptions = $menuItem->menuOptions->whereIn('id', $request->menu_option);

            $options = [
                'menu_size' => [],
                'menu_options' => [],
                'menu_info' => [
                    'image' => $menuItem->item_image,
                    'slug' => $menuItem->slug,
                ]
            ];

            if ($menuSize !== null) {
                $options['menu_size'] = [
                    'id' => $menuSize?->id,
                    'name' => $menuSize?->name,
                    'price' => $menuSize?->price
                ];
            }

            foreach ($menuOptions as $option) {
                $options['menu_options'][] = [
                    'id' => $option->id,
                    'name' => $option->name,
                    'price' => $option->price,
                ];
            }

            Cart::add([
                'id' => $menuItem->id,
                'name' => $menuItem->name,
                'qty' => $request->quantity,
                'price' => $menuItem->offer_price > 0 ? $menuItem->offer_price : $menuItem->price,
                'weight' => 0,
                'options' => $options,
            ]);

            $cartCount = Cart::content()->count();

            return response([
                'status' => 'success',
                'message' => 'Product added into cart!',
                'cartCount' => $cartCount,
            ], 200);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => 'Something went wrong!'], 500);
        }
    }

    function cartQtyUpdate(Request $request): Response
    {
        $cartItem = Cart::get($request->rowId);
        $product = MenuItem::findOrFail($cartItem->id);

        try {
            $cart = Cart::update($request->rowId, $request->qty);
            return response([
                'status' => 'success',
                'product_total' => productTotal($request->rowId),
                'qty' => $cart->qty,
                'cartTotal' => cartTotal(),
                'grand_cart_total' => grandCartTotal(),
            ], 200);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => 'Something went wrong. Please reload the page.'], 500);
        }
    }

    function cartProductRemove($rowId)
    {
        try {
            Cart::remove($rowId);

            if (Cart::count() === 0) {
                Session::forget('voucher');
            }

            return response([
                'status' => 'success',
                'message' => 'Item has been removed!',
                'cartCount' => Cart::count(),
                'cartTotal' => cartTotal(),
                'grand_cart_total' => grandCartTotal(),
            ], 200);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Sorry something went wrong!'], 500);
        }
    }

    function applyVoucher(Request $request)
    {
        $request->validate([
            'subTotal' => 'required|numeric|min:0',
            'voucher' => 'required|exists:vouchers,id',
        ]);

        $subTotal = $request->input('subTotal');
        $voucherId = $request->input('voucher');

        if ($subTotal == 0) {
            return response(['message' => 'The voucher cannot be applied because the cart is empty.'], 422);
        }

        $voucher = Voucher::find($voucherId);

        if (!$voucher) {
            return response(['message' => 'Voucher not found'], 404);
        }

        if ($voucher->expiry_date !== null && $voucher->expiry_date < now()) {
            return response(['message' => 'This voucher is already expired'], 422);
        }

        $discount = (float) $voucher->discount_value;

        if ($discount > $subTotal) {
            $discount = $subTotal;
        }

        $finalTotal = $subTotal - $discount;

        session()->put('voucher', [
            'id' => $voucher->id,
            'discount' => $discount,
        ]);

        return response([
            'message' => 'Voucher Applied Successfully.',
            'discount' => $discount,
            'finalTotal' => $finalTotal,
            'voucher' => $voucher,
        ]);
    }

    public function removeVoucher(Request $request)
    {
        session()->forget('voucher');

        return response([
            'message' => 'Voucher has been removed',
        ]);
    }

    // Delete All Items
    function cartDestroy()
    {
        try {
            Cart::destroy();
            session()->forget('voucher');

            return response([
                'status' => 'success',
                'message' => 'All Item has been removed!',
                'cartCount' => Cart::count(),
                'cartTotal' => cartTotal(),
                'grand_cart_total' => grandCartTotal(),
            ], 200);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Sorry something went wrong!'], 500);
        }
    }
}
