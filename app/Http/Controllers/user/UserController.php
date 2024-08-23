<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $testimonials = Testimonial::all();

        $productsByCategory = [];
        foreach ($categories as $category) {
            $productsByCategory[$category->id] = Product::where('category_id', $category->id)->get();
        }

        // dd($productsByCategory);
        return view('user.dashboard', compact('categories', 'productsByCategory', 'testimonials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'regions' => 'required|string|max:255',
            'description' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Testimonial::create([
            'regions' => $request->regions,
            'description' => $request->description,
            'rating' => $request->rating,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('user.home')->with('success', 'Testimonial created successfully.');
    }
}
