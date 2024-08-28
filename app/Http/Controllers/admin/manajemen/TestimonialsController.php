<?php

namespace App\Http\Controllers\admin\manajemen;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with('user')->get();
        $users = User::all();
        return view('admin.testimonials.index', compact('testimonials', 'users'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'regions' => 'required|string|max:255',
            'description' => 'required|string',
            'rating' => 'required|integer|min:0|max:5',
            'user_id' => 'required|exists:users,id',
        ]);

        Testimonial::create($request->all());

        return redirect()->route('testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return response()->json($testimonial);
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'regions' => 'required|string|max:255',
            'description' => 'required|string',
            'rating' => 'required|integer|min:0|max:5',
            'user_id' => 'required|exists:users,id',
        ]);

        $testimonial->update($request->all());

        return redirect()->route('testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
