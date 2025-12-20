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
            [
                'title' => 'Science Laboratory',
                'description' => 'Well-equipped science laboratory where students conduct experiments and explore scientific concepts hands-on.',
                'image' => 'science-lab.jpg',
                'sort_order' => 4,
                'is_active' => true
            ],
            [
                'title' => 'Library Reading Time',
                'description' => 'Students enjoying quiet reading time in our well-stocked library with a wide collection of books.',
                'image' => 'library-reading.jpg',
                'sort_order' => 5,
                'is_active' => true
            ],
            [
                'title' => 'Art and Craft Session',
                'description' => 'Creative art and craft sessions where students express their creativity and develop artistic skills.',
                'image' => 'art-craft.jpg',
                'sort_order' => 6,
                'is_active' => true
            ],
            [
                'title' => 'School Garden',
                'description' => 'Our school garden where students learn about nature, plants, and environmental conservation.',
                'image' => 'school-garden.jpg',
                'sort_order' => 7,
                'is_active' => true
            ],
            [
                'title' => 'Graduation Ceremony',
                'description' => 'Proud graduation ceremony celebrating our students achievements and their journey to the next level.',
                'image' => 'graduation.jpg',
                'sort_order' => 8,
                'is_active' => true
            ]
        ];

        foreach ($photos as $photo) {
            PhotoGallery::create($photo);
        }
    }
}
