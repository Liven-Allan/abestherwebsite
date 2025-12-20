<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $fillable = [
        'type',
        'label',
        'value',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    // Scope for active contact info
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for ordered contact info
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    // Scope by type
    public function scopeByType($query, $type)
    {
        return $query->where('type', $type);
    }

    // Get contact info by type
    public static function getByType($type)
    {
        return self::active()->byType($type)->ordered()->get();
    }

    // Get all contact info grouped by type
    public static function getAllGrouped()
    {
        return self::active()->ordered()->get()->groupBy('type');
    }

    // Get icon for contact type
    public function getIconAttribute()
    {
        return match($this->type) {
            'address' => 'fa-map-marker-alt',
            'phone' => 'fa-phone-alt',
            'email' => 'fa-envelope-open',
            default => 'fa-info-circle'
        };
    }

    // Get display label
    public function getDisplayLabelAttribute()
    {
        return $this->label ?: ucfirst($this->type);
    }
}
