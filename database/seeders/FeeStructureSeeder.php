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

        // MTN Payment Method
        FeeStructure::create([
            'type' => 'mtn_payment',
            'title' => 'MTN Mobile Money',
            'image_path' => 'img/mtn.png',
            'description' => 'Dial *165#, Select Payments, Select School Fees, select School Pay, enter the Student Code, Verify the student details, enter the amount to pay, and confirm with your mobile money pin'
        ]);

        // Airtel Payment Method
        FeeStructure::create([
            'type' => 'airtel_payment',
            'title' => 'Airtel Money',
            'image_path' => 'img/airtel.png',
            'description' => 'Dial *185#, Select Payments, Select School Fees, select School Pay, enter the Student Code, Verify the student details, enter the amount to pay, and confirm with your mobile money pin'
        ]);
    }
}
