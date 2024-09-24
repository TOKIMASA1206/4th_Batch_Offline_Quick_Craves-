<?php

namespace App\Http\Controllers;
use App\Models\Point;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WalletController extends Controller
{
    function index() : View {
        $points = Point::all();
        $vouchers = Voucher::all();
        return view('frontend.wallet.index', compact('points','vouchers'));
    }

    public function pointStore(Request $request)
    {
        //
        dd($request->all());
    }
}
