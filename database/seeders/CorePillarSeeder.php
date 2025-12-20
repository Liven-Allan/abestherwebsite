<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CorePillar;

class CorePillarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First pillar - Holistic Development
        CorePillar::create([
            'icon' => 'fa-child',
            'icon_color' => 'bg-primary',
            'title' => 'Holistic & Early Childhood Development',
            'description' => 'We focus on the complete development of every child — cognitive, emotional, social, and physical growth from nursery through primary.',
            'sort_order' => 1,
            'is_active' => true
        ]);

        // Second pillar - Qualified Teachers
        CorePillar::create([
            'icon' => 'fa-chalkboard-teacher',
            'icon_color' => 'bg-success',
            'title' => 'Qualified and Caring Teachers',
            'description' => 'Our team of certified educators are not just teachers but mentors who inspire, guide, and nurture each student with dedication.',
            'sort_order' => 2,
            'is_active' => true
        ]);

        // Third pillar - Academic Performance
        CorePillar::create([
            'icon' => 'fa-trophy',
            'icon_color' => 'bg-warning',
            'title' => 'Strong Academic Performance',
            'description' => 'Consistently excellent PLE results with a 98% pass rate. Our students consistently rank among the top performers in the district.',
            'sort_order' => 3,
            'is_active' => true
        ]);

        // Fourth pillar - Tech Environment
        CorePillar::create([
            'icon' => 'fa-laptop',
            'icon_color' => 'bg-info',
            'title' => 'Safe & Tech-Enabled Environment',
            'description' => 'A secure campus with modern learning facilities, computer labs, and digital learning tools preparing students for the future.',
            'sort_order' => 4,
            'is_active' => true
        ]);
    }
}
