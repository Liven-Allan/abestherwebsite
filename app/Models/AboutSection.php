<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_1',
        'image_2',
        'image_3'
    ];

    // Singleton pattern - only allow one record
    public static function getInstance()
    {
        $instance = self::first();
        
        if (!$instance) {
            // Use parent::create to avoid infinite loop
            $instance = parent::create([
                'title' => 'Shaping Tomorrow\'s Leaders Since 2000',
                'description' => 'Abesther Primary School was established with a vision to provide quality education that nurtures the whole child. For over 25 years, we have been committed to shaping confident, disciplined, and well-grounded learners who excel academically and morally.

Our dedicated team of educators creates a safe and stimulating environment where every child can discover their potential and develop a lifelong love for learning.',
                'image_1' => 'img/about-1.jpg',
                'image_2' => 'img/about-2.jpg',
                'image_3' => 'img/about-3.jpg'
            ]);
        }
        
        return $instance;
    }

    // Format description with line breaks
    public function getFormattedDescriptionAttribute()
    {
        return nl2br(e($this->description));
    }
}
