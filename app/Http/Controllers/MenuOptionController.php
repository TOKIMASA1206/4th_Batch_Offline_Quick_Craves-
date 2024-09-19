<?php

namespace App\Http\Controllers;

use App\Models\MenuOption;
use Illuminate\Http\Request;

class MenuOptionController extends Controller
{
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

            $option = new MenuOption();

            $option->menu_item_id = $request->menu_item_id;
            $option->name = $request->name;
            $option->price = $request->price;
            $option->save();

            return redirect()->back()->with('success', 'Menu option created successfully.');
        } catch (\Exception $e) {
            logger($e);
            return back()->with('error', 'There was an error creating the menu option.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuOption $menuOption)
    {
        return view('admin.menu-items.sizes-options.option-edit', compact('menuOption'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuOption $menuOption)
    {
        try {
            $request->validate([
                'name' => ['required', 'max:255'],
                'price' => ['required', 'numeric'],
                'menu_item_id' => ['required', 'integer'],
            ]);

            $menuOption->menu_item_id = $request->menu_item_id;
            $menuOption->name = $request->name;
            $menuOption->price = $request->price;
            $menuOption->save();

            return to_route('admin.menuSize.show', $menuOption->menuItem->id)->with('success', 'Menu option updated successfully.');
        } catch (\Exception $e) {
            logger($e);
            return back()->with('error', 'There was an error updating the menu option.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuOption $menuOption)
    {
        try {
            $menuOption->delete();
            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'something went wrong']);
        }
    }
}
