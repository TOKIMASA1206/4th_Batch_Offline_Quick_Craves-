<?php

namespace App\Http\Controllers;

use App\DataTables\CategoryDataTable;
use App\Http\Requests\Admin\CategoryCreateRequest;
use App\Models\Category;
use Illuminate\View\View;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.categories.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryCreateRequest $request)
    {
        try {
            $category = new Category();
            $category->name = $request->name;
            $category->slug = generateUniqueSlug('Category' ,$request->name);
            $category->show_at_home = $request->show_at_home;
            $category->status = $request->status;
            $category->save();

            return to_route('admin.category.index')->with('success', 'Category created successfully.');
        } catch (\Exception $e) {
            logger($e);
            return back()->with('error', 'There was an error creating the category.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category) : View
    {
        return view('admin.categories.edit', compact('category'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryCreateRequest $request, Category $category)
    {
        try {
            $category->name = $request->name;
            $category->slug = generateUniqueSlug('Category', $request->name, $category->slug);
            $category->show_at_home = $request->show_at_home;
            $category->status = $request->status;
            $category->save();

            return to_route('admin.category.index')->with('success', 'Category Updated successfully.');
        } catch (\Exception $e) {
            logger($e);
            return back()->with('error', 'There was an error updating the category.');
        }
    }

    /*
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return  response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'something went wrong']);
        }
    }
}
