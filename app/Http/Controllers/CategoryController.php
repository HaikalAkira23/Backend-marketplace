<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $category_name = $request->input('category_name');
        $categories = Category::when($category_name, function ($query, $category_name) {
            $query->where('name', 'like', "%{$category_name}%");
        })
            ->orderBy('name', 'desc')
            ->paginate(10);

        return response()->json(['category' => $categories]);
    }

    public function store(StoreCategoryRequest $request)
    {
        DB::beginTransaction();
        try {
            $category = Category::create($request->validated());
            DB::commit();
            return response()->json(['message' => 'Category berhasil ditambahkan', 'category' => $category]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
    public function show(Category $category)
    {
        return response()->json(['category' => $category]);
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        DB::beginTransaction();
        try {
            $category->update($request->validated());
            DB::commit();
            return response()->json(['message' => 'Category berhasil diupdate', 'category' => $category]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function destroy(Category $category)
    {
        DB::beginTransaction();
        try {
            $category->delete();
            DB::commit();
            return response()->json(['message' => 'Category berhasil dihapus']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
