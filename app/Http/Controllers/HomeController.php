<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Mengambil semua kategori
        $categories = Category::all();

        // Mengambil produk berdasarkan kategori (untuk tab pertama)
        $productsByCategory = [];
        foreach ($categories as $category) {
            $productsByCategory[$category->id] = Product::where('category_id', $category->id)->get();
        }

        return view('home', compact('categories', 'productsByCategory'));
    }
}
