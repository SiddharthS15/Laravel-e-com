#!/usr/bin/env bash
# Render.com deployment script

echo "🚀 Starting Laravel deployment on Render..."

# Install dependencies
composer update --no-dev --optimize-autoloader

# Generate app key if not exists
if [ -z "$APP_KEY" ]; then
    php artisan key:generate --force
fi

# Create SQLite database
touch /opt/render/project/src/database.sqlite

# Cache configurations
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "✅ Deployment completed!"
