<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('frontend.cart.index');
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

            return response(['status' => 'success', 'message' => 'Product added into cart!'], 200);
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
}
