<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeStructure extends Model
{
    protected $fillable = [
        'type',
        'title',
        'image_path',
        'description'
    ];

    // Get tuition fees structure
    public static function getTuitionFees()
    {
        return self::where('type', 'tuition')->first();
    }

    // Get uniform fees structure
    public static function getUniformFees()
    {
        return self::where('type', 'uniform')->first();
    }

    // Ensure only one record per type
    public static function createOrUpdate($type, $data)
    {
        $existing = self::where('type', $type)->first();
        
        if ($existing) {
            $existing->update($data);
            return $existing;
        }
        
        $data['type'] = $type;
        return self::create($data);
    }
}
