<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Carousel;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First carousel slide
        Carousel::create([
            'background_image' => 'img/1766077160_kids.png',
            'first_text' => 'Best School',
            'second_text' => 'Where Learning Meets Creativity & Discovery',
            'third_text' => 'Beyond the classroom, we offer a vibrant range of sports, music, and cultural activities.',
            'is_active' => true,
            'sort_order' => 1
        ]);

        // Second carousel slide
        Carousel::create([
            'background_image' => 'img/1766216812_kid.png',
            'first_text' => 'Nurturing Young Minds',
            'second_text' => 'Building Bright Futures',
            'third_text' => 'At Abesther Primary School, we shape confident, disciplined, and well-grounded learners ready to excel in the modern world.',
            'is_active' => true,
            'sort_order' => 2
        ]);
    }
}
