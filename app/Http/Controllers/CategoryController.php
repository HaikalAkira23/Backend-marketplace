<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facade\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return response()->json(['category' => $categories]);
    }

    // public function store(StoreCategoryRequest $request)
    // {
    //     DB::beginTransaction();
    //     try {

    //     }
    // }
}
