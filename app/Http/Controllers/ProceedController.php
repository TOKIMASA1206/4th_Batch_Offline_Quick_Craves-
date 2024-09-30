<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Proceed;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProceedController extends Controller
{
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
        //
        return view('admin.proceeds.index');
    }

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
    public function update(Request $request, Proceed $proceed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proceed $proceed)
    {
        //
    }
}
