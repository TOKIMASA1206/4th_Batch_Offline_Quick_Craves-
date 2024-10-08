<?php

namespace App\Http\Controllers;

use App\DataTables\MenuItemDataTable;
use App\Http\Requests\Admin\MenuItemCreateRequest;
use App\Http\Requests\MenuItemUpdateRequest;
use App\Models\Category;
use App\Models\MenuItem;
use App\Traits\FileUploadTrait;

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
            $validatedData = $request->validated();

            // Handle Image File
            $imagePath = $this->uploadImage($request, 'image');

            // Create new menu item
            $menuItem = new MenuItem();
            $menuItem->item_image = $imagePath;
            $menuItem->name = $validatedData['name'];
            $menuItem->slug = generateUniqueSlug('MenuItem', $validatedData['name']);
            $menuItem->category_id = $validatedData['category'];
            $menuItem->price = $validatedData['price'];
            $menuItem->offer_price = $validatedData['offer_price'] ?? 0;
            $menuItem->description = $validatedData['description'];
            $menuItem->show_at_home = $validatedData['show_at_home'];
            $menuItem->status = $validatedData['status'];
            $menuItem->save();

            return to_route('admin.menu-item.index')->with('success', 'Menu item created successfully.');
        } catch (\Exception $e) {
            logger($e);
            return back()->with('error', 'There was an error creating the menu item.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuItem $menu_item)
    {
        $categories = Category::all();
        return view('admin.menu-items.edit', compact('menu_item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuItemUpdateRequest $request, MenuItem $menu_item)
    {
        try {
            $validatedData = $request->validated();

            $imagePath = $this->uploadImage($request, 'image');

            $menu_item->item_image = !empty($imagePath) ? $imagePath : $menu_item->item_image;
            $menu_item->name = $validatedData['name'];
            $menu_item->slug = generateUniqueSlug('MenuItem', $validatedData['name'], $menu_item->slug);
            $menu_item->category_id = $validatedData['category'];
            $menu_item->price = $validatedData['price'];
            $menu_item->offer_price = $validatedData['offer_price'] ?? 0;
            $menu_item->description = $validatedData['description'];
            $menu_item->show_at_home = $validatedData['show_at_home'];
            $menu_item->status = $validatedData['status'];
            $menu_item->save();

            return to_route('admin.menu-item.index')->with('success', 'Menu item Updated successfully.');
        } catch (\Exception $e) {
            logger($e);
            return back()->with('error', 'There was an error updating the menu item.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuItem $menu_item)
    {
        try {
            $menu_item->delete();
            return  response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'something went wrong']);
        }
    }
}
