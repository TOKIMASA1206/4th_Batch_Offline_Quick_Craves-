<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Voucher;
use Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WalletController extends Controller
{
    function index(): View
    {
        $points = Point::all();

        $vouchers = Voucher::all();

        $user = Auth::user();
        $stampCount = $user->stamp->stamp_count;
        $totalStamps = 10;
        return view('frontend.wallet.index', compact(
            'points',
            'vouchers',
            'stampCount',
            'totalStamps'
        ));
    }

    public function pointStore(Request $request)
    {
        //
        dd($request->all());
    }
}
