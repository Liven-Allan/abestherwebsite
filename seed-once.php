<?php

// Simple script to seed database only if it's empty
// Run this manually: php seed-once.php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Check if database has been seeded
$userCount = App\Models\User::count();

if ($userCount == 0) {
    echo "Database is empty, running seeders...\n";
    Artisan::call('db:seed', ['--force' => true]);
    echo "Seeding completed!\n";
} else {
    echo "Database already has $userCount users, skipping seeders.\n";
}