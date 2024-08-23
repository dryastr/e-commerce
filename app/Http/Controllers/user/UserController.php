<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Mengambil semua kategori
        $categories = Category::all();

        // Mengambil produk berdasarkan kategori (untuk tab pertama)
        $productsByCategory = [];
        foreach ($categories as $category) {
            $productsByCategory[$category->id] = Product::where('category_id', $category->id)->get();
        }

        // dd($productsByCategory);
        return view('user.dashboard', compact('categories', 'productsByCategory'));
    }
}
