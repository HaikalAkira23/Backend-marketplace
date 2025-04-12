<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(10);
        return response()->json(['brand' => $brands]);
    }

    public function create()
    {
        //
    }

    // public function store(StoreBrandRequest $request)
    // {
    //     DB::beginTransaction();
    //     try {
    //         $brand = Brand::create($request->validated());
    //         DB::commit();
    //         return response()->json(['message' => 'Brand berhasil ditambahkan', 'brand' => $brand]);
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return response()->json(['message' => $e->getMessage()], 500);
    //     }
    // }

    public function show(Brand $brand)
    {
        return response()->json(['brand' => $brand]);
    }

    public function edit(Brand $brand)
    {
        //
    }

    // public function update(UpdateBrandRequest $request, Brand $brand)
    // {
    //     DB::beginTransaction();
    //     try {
    //         $brand->update($request->validated());
    //         DB::commit();
    //         return response()->json(['message' => 'Brand berhasil diubah', 'brand' => $brand]);
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return response()->json(['message' => $e->getMessage()], 500);
    //     }
    // }

    public function destroy(Brand $brand)
    {
        DB::beginTransaction();
        try {
            $brand->delete(); 
            DB::commit();
            return response()->json(['message'=> 'Brand berhasil dihapus']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
