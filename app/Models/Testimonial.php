<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'regions',
        'description',
        'rating',
        'user_id',
    ];

    /**
     * Get the user that owns the testimonial.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
