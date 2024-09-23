<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::where(['show_at_home' => 1, 'status' => 1])->get();
        return view('frontend.home.index', compact('categories'));
    }

    function loadMenuModal($menuId)
    {
        $menuItem = MenuItem::with(['menuSizes', 'menuOptions'])->findOrFail($menuId);

        return view('frontend.layouts.ajax-files.menuModal', compact('menuItem'))->render();
    }
}
