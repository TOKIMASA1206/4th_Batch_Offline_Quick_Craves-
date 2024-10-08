<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Carbon\Carbon;

use function PHPUnit\Framework\returnSelf;

class ProceedController extends Controller
{

    private $order;
    private $orderItem;

    public function __construct(Order $order, OrderItem $orderItem)
    {

        $this->order = $order;
        $this->orderItem = $orderItem;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Carbon::today();

        $orders = Order::where('user_id', Auth::user()->id)
            ->where('payment_status', 'completed')
            ->whereDate('created_at', $today)
            ->latest()
            ->get();

        return view('frontend.proceed.index', compact('orders'));
    }

    public function adminIndex()
    {

        $all_orders = $this->order->where('order_status', "pending")->orderBy('created_at', 'desc')->get();

        $all_orderItems = [];
        foreach ($all_orders as $order) {
            $all_orderItems[$order->id] = $this->orderItem->where('order_id', $order->id)->get();
        }

        return view('admin.proceeds.index')
            ->with('all_orders', $all_orders)
            ->with('all_orderItems', $all_orderItems);
    }

    public function update($id)
    {

        $order = $this->order->findOrFail($id);

        $order->order_status = "completed";

        $order->save();

        return redirect()->route('admin.proceed.index');
    }

}
