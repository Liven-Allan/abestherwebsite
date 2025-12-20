<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutSection;

class AboutSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutSection::create([
            'title' => 'Shaping Tomorrow\'s Leaders Since 2000',
            'description' => 'Abesther Primary School was established with a vision to provide quality education that nurtures the whole child. For over 25 years, we have been committed to shaping confident, disciplined, and well-grounded learners who excel academically and morally.

Our dedicated team of educators creates a safe and stimulating environment where every child can discover their potential and develop a lifelong love for learning.',
            'image_1' => 'img/1766093384_Liven.png',
            'image_2' => 'img/1766216637_image_2_graduate.png',
            'image_3' => 'img/1766217361_image_3_schl_kids.png'
        ]);
    }
}
