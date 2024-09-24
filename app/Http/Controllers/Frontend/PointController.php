<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Point;
use Illuminate\Http\Request;

class PointController extends Controller
{
    //

    private $point;

    public function __construct(Point $point) {
        $this->point = $point;
    }

    function index() {
        return view('frontend.wallet.index');
    }

}
