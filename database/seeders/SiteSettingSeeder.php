<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Only create if no site settings exist (singleton pattern)
        if (SiteSetting::count() == 0) {
            SiteSetting::create([
                'school_name' => 'Abesther Primary School',
                'school_logo_icon' => 'fa-book-reader',
                'facebook_url' => 'https://facebook.com/abesther-primary-school',
                'twitter_url' => 'https://twitter.com/abesther_school',
                'youtube_url' => 'https://youtube.com/@abesther-primary-school',
                'linkedin_url' => 'https://linkedin.com/company/abesther-primary-school'
            ]);
        }
    }
}
