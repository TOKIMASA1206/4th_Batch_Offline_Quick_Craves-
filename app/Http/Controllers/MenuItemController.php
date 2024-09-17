<?php

namespace App\Http\Controllers;

use App\DataTables\MenuItemDataTable;
use App\Http\Requests\Admin\MenuItemCreateRequest;
use App\Models\Category;
use App\Models\MenuItem;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(MenuItemDataTable $dataTable)
    {
        return $dataTable->render('admin.menu-items.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.menu-items.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuItemCreateRequest $request)
    {
        try {
            // Handle Image File
            $imagePath = $this->uploadImage($request, 'image');
            $menuItem = new MenuItem();
            $menuItem->item_image = $imagePath;
            $menuItem->name = $request->name;
            $menuItem->slug = generateUniqueSlug('MenuItem', $request->name);
            $menuItem->category_id = $request->category;
            $menuItem->price = $request->price;
            $menuItem->offer_price = $request->offer_price ?? 0;
            $menuItem->description = $request->description;
            $menuItem->show_at_home = $request->show_at_home;
            $menuItem->status = $request->status;
            $menuItem->save();

            return to_route('admin.menu-item.index')->with('success', 'Menu item created successfully.');
        } catch (\Exception $e) {
            logger($e);
            return back()->with('error', 'There was an error creating the menu item.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
