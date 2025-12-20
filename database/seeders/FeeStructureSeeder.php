<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FeeStructure;

class FeeStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tuition Fees Structure
        FeeStructure::create([
            'type' => 'tuition',
            'title' => 'Tuition Fees',
            'image_path' => 'img/tuition_fees.png',
            'description' => 'Complete breakdown of tuition fees for all classes'
        ]);

        // School Uniform Fees Structure
        FeeStructure::create([
            'type' => 'uniform',
            'title' => 'Other Fees (Uniforms & More)',
            'image_path' => 'img/school_uniform_fees.png',
            'description' => 'School uniforms, books, and other miscellaneous fees'
        ]);
    }
}
