<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LatestNews;
use Carbon\Carbon;

class LatestNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsItems = [
            [
                'title' => 'New Academic Year 2024-2025 Begins',
                'content' => 'We are excited to announce the beginning of our new academic year 2024-2025. All students are requested to report to their respective classes on the first day of school. New admission forms are available at the school office. We look forward to another successful year of learning and growth.',
                'image' => 'news-1.jpg',
                'published_date' => Carbon::now()->subDays(5),
                'is_active' => true
            ],
            [
                'title' => 'Annual Sports Day Competition',
                'content' => 'Our annual sports day will be held next month featuring various athletic competitions including track and field events, team sports, and individual competitions. Parents and guardians are cordially invited to attend and cheer for their children. Registration for events is now open.',
                'image' => 'news-2.jpg',
                'published_date' => Carbon::now()->subDays(10),
                'is_active' => true
            ],
            [
                'title' => 'Science Fair Winners Announced',
                'content' => 'Congratulations to all participants in our recent science fair. The creativity and innovation displayed by our students was truly remarkable. Winners will receive their awards at the upcoming assembly. Special recognition goes to our top three projects in each grade category.',
                'image' => 'news-3.jpg',
                'published_date' => Carbon::now()->subDays(15),
                'is_active' => true
            ],
            [
                'title' => 'Parent-Teacher Conference Schedule',
                'content' => 'Parent-teacher conferences are scheduled for the end of this month. This is an excellent opportunity for parents to discuss their child\'s progress with teachers. Please contact the school office to schedule your appointment. Conference slots are available from 9 AM to 4 PM.',
                'image' => 'news-4.jpg',
                'published_date' => Carbon::now()->subDays(20),
                'is_active' => true
            ],
            [
                'title' => 'New Library Books Collection',
                'content' => 'Our school library has received a wonderful collection of new books covering various subjects and age groups. Students are encouraged to explore these new additions during their library periods. The collection includes both fiction and non-fiction titles to support curriculum learning.',
                'image' => 'news-5.jpg',
                'published_date' => Carbon::now()->subDays(25),
                'is_active' => true
            ],
            [
                'title' => 'School Uniform Policy Update',
                'content' => 'Please note the updated school uniform policy effective from next semester. The new guidelines ensure comfort while maintaining our school\'s professional appearance standards. Detailed information has been sent to all parents via email and is available on our website.',
                'image' => 'news-6.jpg',
                'published_date' => Carbon::now()->subDays(30),
                'is_active' => true
            ]
        ];

        foreach ($newsItems as $news) {
            LatestNews::create($news);
        }
    }
}
