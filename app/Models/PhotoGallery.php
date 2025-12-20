<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    // Scope for active photos
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for ordered photos
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    // Get image URL
    public function getImageUrlAttribute()
    {
        return asset('img/gallery/' . $this->image);
    }

    // Get thumbnail URL (for admin listing)
    public function getThumbnailUrlAttribute()
    {
        return $this->image_url;
    }

    // Get short description
    public function getShortDescriptionAttribute()
    {
        if (!$this->description) {
            return null;
        }
        return strlen($this->description) > 100 
            ? substr($this->description, 0, 100) . '...' 
            : $this->description;
    }
}
