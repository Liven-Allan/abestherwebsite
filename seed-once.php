<?php

// Simple script to create admin user only if it doesn't exist
// Run this manually: php seed-once.php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Check if admin user exists
$adminExists = App\Models\User::where('email', 'admin@school.com')->exists();

if (!$adminExists) {
    echo "Creating admin user...\n";
    App\Models\User::create([
        'name' => 'School Admin',
        'email' => 'admin@school.com',
        'username' => 'admin',
        'password' => Illuminate\Support\Facades\Hash::make('password123'),
    ]);
    echo "Admin user created successfully!\n";
    echo "Email: admin@school.com\n";
    echo "Password: password123\n";
} else {
    echo "Admin user already exists, skipping user creation.\n";
}

echo "\nNote: Other data seeders have been disabled to protect production data.\n";
echo "If you need to seed other data, run individual seeders manually:\n";
echo "php artisan db:seed --class=CarouselSeeder\n";
echo "php artisan db:seed --class=AboutSectionSeeder\n";
echo "etc.\n";