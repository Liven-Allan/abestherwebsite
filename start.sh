#!/bin/bash

# Run migrations
echo "Running migrations..."
php artisan migrate --force

# Check if database is empty (no users table data)
echo "Checking if database needs seeding..."
USER_COUNT=$(php artisan tinker --execute="echo App\Models\User::count();" 2>/dev/null || echo "0")

if [ "$USER_COUNT" -eq "0" ]; then
    echo "Database is empty, running seeders..."
    php artisan db:seed --force || echo "Seeding failed, but continuing..."
else
    echo "Database already has data, skipping seeders..."
fi

# Start the server
echo "Starting server..."
php artisan serve --host 0.0.0.0 --port $PORT