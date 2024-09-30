<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Proceed;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class ProceedController extends Controller
{

    private $order;
    private $orderItem;

    public function __construct(Order $order, OrderItem $orderItem) {

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

    public function adminIndex() {

        $all_orders = $this->order->where('order_status',"pending")->orderBy('created_at', 'desc')->get();

        $all_orderItems = [];
        foreach ($all_orders as $order) {
            $all_orderItems[$order->id] = $this->orderItem->where('order_id', $order->id)->get();
        }
       return view('admin.proceeds.index')
                ->with('all_orders',$all_orders)
                ->with('all_orderItems',$all_orderItems);
    }

    public function update($id) {

        $order = $this->order->findOrFail($id);

        $order->order_status = "completed";

        $order->save();

        return redirect()->route('admin.proceed.index');
    }

    // private function getItems($id) {

    //     return $this->orderItem->where('order_id', $id)->get();
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Proceed $proceed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proceed $proceed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proceed $proceed)
    {
        //
    }
}
