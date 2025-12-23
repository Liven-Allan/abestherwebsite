<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a default user without using factories
        if (!\App\Models\User::where('email', 'admin@school.com')->exists()) {
            \App\Models\User::create([
                'name' => 'School Admin',
                'email' => 'admin@school.com',
                'username' => 'admin',
                'password' => \Illuminate\Support\Facades\Hash::make('password123'),
            ]);
        }

        // Run all seeders
        $this->call([
            CarouselSeeder::class,
            AboutSectionSeeder::class,
            ContactInfoSeeder::class,
            CorePillarSeeder::class,
            FeeStructureSeeder::class,
            LatestNewsSeeder::class,
            PhotoGallerySeeder::class,
            SiteSettingSeeder::class,
            StaffSeeder::class,
        ]);
    }
}
