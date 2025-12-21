#!/bin/bash

# Production deployment script - SAFE for existing data
echo "Starting production deployment..."

# Run migrations only (safe - won't overwrite data)
echo "Running migrations..."
php artisan migrate --force

# Clear and cache config (safe)
echo "Caching configuration..."
php artisan config:cache

# Start the server
echo "Starting server on port $PORT..."
echo "✅ SAFE: No seeders will run - production data is protected"
exec php artisan serve --host 0.0.0.0 --port $PORT