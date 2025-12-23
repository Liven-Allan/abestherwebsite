<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class LatestNews extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image',
        'published_date',
        'is_active'
    ];

    protected $casts = [
        'published_date' => 'date',
        'is_active' => 'boolean'
    ];

    // Scope for active news
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for recent news
    public function scopeRecent($query, $limit = 6)
    {
        return $query->orderBy('published_date', 'desc')->limit($limit);
    }

    // Get formatted published date
    public function getFormattedDateAttribute()
    {
        return $this->published_date->format('M d, Y');
    }

    // Get excerpt from content
    public function getExcerptAttribute()
    {
        return substr(strip_tags($this->content), 0, 300) . '...';
    }
}
