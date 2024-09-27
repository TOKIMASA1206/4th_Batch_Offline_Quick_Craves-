<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use Cart;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    /** Store Order in Database  */
    function createOrder()
    {
        try {
            $order = new Order();
            $order->invoice_id = generateInvoiceId();
            $order->user_id = Auth::user()->id;
            $order->discount = session()->get('voucher')['discount'] ?? 0;
            $order->subtotal = cartTotal();
            $order->grand_total = grandCartTotal();
            $order->product_qty = Cart::content()->count();
            $order->payment_method = NULL;
            $order->payment_status = 'pending';
            $order->payment_approve_date = NULL;
            $order->transaction_id = NULL;
            $order->coupon_info = json_encode(session()->get('voucher'));
            $order->currency_name = NULL;
            $order->order_status = 'pending';
            $order->save();

            foreach (Cart::content() as $product) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->menu_item_name = $product->name;
                $orderItem->menu_item_id = $product->id;
                $orderItem->unit_price = $product->price;
                $orderItem->qty = $product->qty;
                $orderItem->menu_item_size = json_encode($product->options->menu_size);
                $orderItem->menu_item_option = json_encode($product->options->menu_options);
                $orderItem->save();
            }

            /** Putting the Order Id in session */
            session()->put('order_id', $order->id);

            /** Putting the grand total amount in session */
            session()->put('grand_total', $order->grand_total);


            return true;
        } catch (\Exception $e) {
            logger($e);
            return false;
        }
    }


    /** Clear Session Items */
    function clearSession()
    {
        Cart::destroy();
        session()->forget('voucher');
        session()->forget('order_id');
        session()->forget('grand_total');
    }
}
