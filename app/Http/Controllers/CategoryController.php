<?php

namespace App\Http\Controllers;

use App\DataTables\CategoryDataTable;
use App\Http\Requests\Admin\CategoryCreateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Str;



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
            $category->slug = $this->createUniqueSlug($request->name);
            $category->show_at_home = $request->show_at_home;
            $category->status = $request->status;
            $category->save();

            // 成功メッセージをセッションにフラッシュ
            return to_route('admin.category.index')->with('success', 'Category created successfully.');
        } catch (\Exception $e) {
            logger($e);
            // エラーメッセージをセッションにフラッシュ
            return back()->with('error', 'There was an error creating the category.');
        }
    }

    private function createUniqueSlug($name)
    {
        // ベースのスラッグを生成
        $slug = Str::slug($name);
        $originalSlug = $slug;

        // 同じスラッグが存在するか確認
        $count = 1;
        while (Category::where('slug', $slug)->exists()) {
            // 存在する場合、スラッグの末尾に数字を追加
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
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
