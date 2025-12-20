#!/bin/bash

# Run migrations
echo "Running migrations..."
php artisan migrate --force

# Start the server immediately (skip seeding for now)
echo "Starting server on port $PORT..."
echo "Note: Run 'php artisan db:seed --force' manually from Railway console to seed data"
exec php artisan serve --host 0.0.0.0 --port $PORT