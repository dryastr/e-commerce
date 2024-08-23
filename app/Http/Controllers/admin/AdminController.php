<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // Mendapatkan semua data testimonial
        $testimonials = Testimonial::all();
        $totalTestimonials = $testimonials->count();

        // Menghitung jumlah testimonial dengan rating 5
        $totalFiveStarTestimonials = Testimonial::where('rating', 5)->count();

        // Menghitung jumlah testimonial berdasarkan tanggal (30 hari terakhir)
        $testimonialData = Testimonial::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $dates = [];
        $counts = [];
        foreach ($testimonialData as $data) {
            $dates[] = $data->date;
            $counts[] = $data->count;
        }

        return view('admin.dashboard', compact('totalTestimonials', 'totalFiveStarTestimonials', 'dates', 'counts'));
    }
}
