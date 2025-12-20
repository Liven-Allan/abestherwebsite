#!/bin/bash

# Run migrations
echo "Running migrations..."
php artisan migrate --force

# Check if database is empty (no users table data)
USER_COUNT=$(php artisan tinker --execute="echo App\Models\User::count();")

if [ "$USER_COUNT" -eq "0" ]; then
    echo "Database is empty, running seeders..."
    php artisan db:seed --force
else
    echo "Database already has data, skipping seeders..."
fi

# Start the server
echo "Starting server..."
php artisan serve --host 0.0.0.0 --port $PORT