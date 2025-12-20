<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CorePillar extends Model
{
    protected $fillable = [
        'icon',
        'icon_color',
        'title',
        'description',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Scope to get only active pillars
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope to get pillars in order
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('id', 'asc');
    }
}
