<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $product_name = $request->input('product_name');
        $category_name = $request->input('category_name');
        $brand_name = $request->input('brand_name');

        $products = Product::with(['category', 'brand'])
            ->when($product_name, function ($query, $product_name) {
                $query->where('name', 'like', "%{$product_name}%");
            })
            ->when($category_name, function ($query, $category_name) {
                $query->whereHas('category', function ($query) use ($category_name) {
                    $query->where('name', 'like', "%{$category_name}%");
                });
            })
            ->when($brand_name, function ($query, $brand_name) {
                $query->whereHas('brand', function ($query) use ($brand_name) {
                    $query->where('name', 'like', "%{$brand_name}%");
                });
            })
            ->orderBy('price', 'desc')
            ->paginate(10);
        return response()->json(['products' => $products]);
    }

    // public function store(StoreProductRequest $request)
    // {
    //     $product = Product::create($request->validated());
    //     return response()->json(['message' => 'Produk berhasil ditambahkan']);
    // }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        if ($product) {
            return response()->json(['product' => $product]);
        } else {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }
    }

    // public function update(UpdateProductRequest $request, string $id)
    // {
    //     $product = Product::findOrFail($id);

    //     if (!$product) {
    //         return response()->json(['message' => 'Produk tidak ditemukan'], 404);
    //     }

    //     $product->update($request->all());
    //     return response()->json(['message' => 'Produk berhasil diupdate']);
    // }

    public function destroy (string $id)
    {
        $product = Product::findOrFail($id);

        if (!$product) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        $product->delete();
        return response()->json(['message' => 'Produk berhasil dihapus']);
    }
}
