<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all(); // Ambil semua kategori
        return view('product.create', compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        // Otomatis tervalidasi oleh StoreProductRequest!
        $validated = $request->validated();
        
        $validated['user_id'] = Auth::id(); 
        Product::create($validated);

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.view', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        Gate::authorize('update', $product);
        $categories = \App\Models\Category::all(); 
        return view('product.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        Gate::authorize('update', $product);

        // Otomatis tervalidasi oleh UpdateProductRequest!
        $validated = $request->validated();

        $product->update($validated);

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        
        // Cek Policy sebelum menghapus data
        Gate::authorize('delete', $product);

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}