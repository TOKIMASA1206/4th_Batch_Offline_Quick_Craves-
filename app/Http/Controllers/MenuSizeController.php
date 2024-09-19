<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\MenuOption;
use App\Models\MenuSize;
use Illuminate\Http\Request;

class MenuSizeController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menuItem = MenuItem::findOrFail($id);
        $sizes = MenuSize::where('menu_item_id', $menuItem->id)->get();
        $options = MenuOption::where('menu_item_id', $menuItem->id)->get();
        return view('admin.menu-items.sizes-options.index', compact('menuItem', 'sizes', 'options'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'max:255'],
                'price' => ['required', 'numeric'],
                'menu_item_id' => ['required', 'integer'],
            ]);

            $size = new MenuSize();

            $size->menu_item_id = $request->menu_item_id;
            $size->name = $request->name;
            $size->price = $request->price;
            $size->save();

            return redirect()->back()->with('success', 'Menu size created successfully.');
        } catch (\Exception $e) {
            logger($e);
            return back()->with('error', 'There was an error creating the menu size.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuSize $menuSize)
    {
        return view('admin.menu-items.sizes-options.size-edit', compact('menuSize'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuSize $menuSize)
    {
        try {
            $request->validate([
                'name' => ['required', 'max:255'],
                'price' => ['required', 'numeric'],
                'menu_item_id' => ['required', 'integer'],
            ]);

            $menuSize->menu_item_id = $request->menu_item_id;
            $menuSize->name = $request->name;
            $menuSize->price = $request->price;
            $menuSize->save();

            return to_route('admin.menuSize.show', $menuSize->menuItem->id)->with('success', 'Menu size updated successfully.');
        } catch (\Exception $e) {
            logger($e);
            return back()->with('error', 'There was an error updating the menu size.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $size = MenuSize::findOrFail($id);
            $size->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'something went wrong']);
        }
    }
}
