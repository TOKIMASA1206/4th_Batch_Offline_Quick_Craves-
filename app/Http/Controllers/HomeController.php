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
        $menuItems = MenuItem::where(['show_at_home' => 1, 'status' => 1])
            ->orderBy('id', 'DESC')
            ->paginate(4);
        return view('frontend.home.index', compact('categories','menuItems'));
    }
    

    function loadMenuModal($menuId)
    {
        $menuItem = MenuItem::with(['menuSizes', 'menuOptions'])->findOrFail($menuId);

        return view('frontend.layouts.ajax-files.menuModal', compact('menuItem'))->render();
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        if (!$query) {
            return redirect()->back()->with('error', 'Please enter a search term.');
        }
    
        $menuItems = MenuItem::where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('description', 'LIKE', '%' . $query . '%')
            ->paginate(4)
            ->appends(['query' => $query]);
    
        return view('frontend.search.index', compact('menuItems', 'query'));
    }
    
}
