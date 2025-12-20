<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PhotoGallery;

class PhotoGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $photos = [
            [
                'title' => 'School Building',
                'description' => 'Our beautiful main school building with modern facilities and spacious classrooms designed for optimal learning.',
                'image' => 'school-building.jpg',
                'sort_order' => 1,
                'is_active' => true
            ],
            [
                'title' => 'Classroom Activities',
                'description' => 'Students engaged in interactive learning activities with our dedicated teachers using modern teaching methods.',
                'image' => 'classroom-activities.jpg',
                'sort_order' => 2,
                'is_active' => true
            ],
            [
                'title' => 'Sports Day Event',
                'description' => 'Annual sports day celebration where students showcase their athletic talents and team spirit.',
                'image' => 'sports-day.jpg',
                'sort_order' => 3,
                'is_active' => true
            ],
           
        ];

        foreach ($photos as $photo) {
            PhotoGallery::create($photo);
        }
    }
}
