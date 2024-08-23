<?php

namespace App\Http\Controllers\admin\manajemen;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        $categories = Category::all();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'is_best_seller' => 'boolean',
            'rating' => 'nullable|integer|min:0|max:5',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imageUrl = null;
        if ($request->hasFile('image')) {
            $imageUrl = $request->file('image')->store('public/products');
            $imageUrl = str_replace('public/', '', $imageUrl);
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'is_best_seller' => $request->is_best_seller,
            'rating' => $request->rating,
            'image_url' => $imageUrl,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'is_best_seller' => 'boolean',
            'rating' => 'nullable|integer|min:0|max:5',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $imageUrl = $product->image_url;
        if ($request->hasFile('image')) {
            if ($imageUrl && Storage::exists('public/' . $imageUrl)) {
                Storage::delete('public/' . $imageUrl);
            }
            $imageUrl = $request->file('image')->store('public/products');
            $imageUrl = str_replace('public/', '', $imageUrl);
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'is_best_seller' => $request->is_best_seller,
            'rating' => $request->rating,
            'image_url' => $imageUrl,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->image_url && Storage::exists('public/' . $product->image_url)) {
            Storage::delete('public/' . $product->image_url);
        }
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
