<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Staff;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First staff member
        Staff::create([
            'profile_picture' => 'img/1766218778_mathteacher.png',
            'first_name' => 'Sarah',
            'last_name' => 'Johnson',
            'role' => 'Mathematics Teacher',
            'sort_order' => 1,
            'is_active' => true
        ]);

        // Second staff member
        Staff::create([
            'profile_picture' => 'img/1766218877_maleteacher.png',
            'first_name' => 'Michael',
            'last_name' => 'Brown',
            'role' => 'Science Teacher',
            'sort_order' => 2,
            'is_active' => true
        ]);

        // Third staff member
        Staff::create([
            'profile_picture' => 'img/1766218960_matht',
            'first_name' => 'Emily',
            'last_name' => 'Davis',
            'role' => 'English Teacher',
            'sort_order' => 3,
            'is_active' => true
        ]);
    }
}
