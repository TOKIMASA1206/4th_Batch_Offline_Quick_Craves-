<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class WalletController extends Controller
{
    function index() : View {
        return view('frontend.wallet.index');
    }
}
