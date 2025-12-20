<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable = [
        'background_image',
        'first_text',
        'second_text',
        'third_text',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Scope to get only active slides
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope to get slides in order
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('id', 'asc');
    }
}
