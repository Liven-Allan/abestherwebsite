<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactInfo;

class ContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contactInfos = [
            // Address
            [
                'type' => 'address',
                'label' => 'School Address',
                'value' => '123 Street, New York, USA',
                'sort_order' => 1,
                'is_active' => true
            ],
            
            // Emails
            [
                'type' => 'email',
                'label' => 'General Information',
                'value' => 'info@example.com',
                'sort_order' => 1,
                'is_active' => true
            ],
            [
                'type' => 'email',
                'label' => 'Admissions',
                'value' => 'admissions@example.com',
                'sort_order' => 2,
                'is_active' => true
            ],
            
            // Phone Numbers
            [
                'type' => 'phone',
                'label' => 'Main Office',
                'value' => '+012 345 6789',
                'sort_order' => 1,
                'is_active' => true
            ],
            [
                'type' => 'phone',
                'label' => 'Admissions Office',
                'value' => '+012 345 6790',
                'sort_order' => 2,
                'is_active' => true
            ],
            [
                'type' => 'phone',
                'label' => 'Emergency Contact',
                'value' => '+012 345 6791',
                'sort_order' => 3,
                'is_active' => true
            ]
        ];

        foreach ($contactInfos as $contactInfo) {
            ContactInfo::create($contactInfo);
        }
    }
}
