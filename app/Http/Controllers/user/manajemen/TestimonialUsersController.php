<?php

namespace App\Http\Controllers\user\manajemen;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::where('user_id', Auth::id())->get();
        return view('testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'regions' => 'required|string|max:255',
            'description' => 'required|string',
            'rating' => 'required|integer|min:0|max:5',
        ]);

        Testimonial::create([
            'regions' => $request->regions,
            'description' => $request->description,
            'rating' => $request->rating,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        $this->authorize('view', $testimonial);
        return view('testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        $this->authorize('update', $testimonial);
        return view('testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $this->authorize('update', $testimonial);

        $request->validate([
            'regions' => 'required|string|max:255',
            'description' => 'required|string',
            'rating' => 'required|integer|min:0|max:5',
        ]);

        $testimonial->update([
            'regions' => $request->regions,
            'description' => $request->description,
            'rating' => $request->rating,
        ]);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $this->authorize('delete', $testimonial);
        $testimonial->delete();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
