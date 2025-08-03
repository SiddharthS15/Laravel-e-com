#!/bin/bash
# Laravel deployment script for Railway/Heroku

echo "🚀 Starting Laravel deployment..."

# Install dependencies
echo "📦 Installing Composer dependencies..."
composer install --no-dev --optimize-autoloader

# Generate app key if not exists
if [ -z "$APP_KEY" ]; then
    echo "🔑 Generating application key..."
    php artisan key:generate --force
fi

# Create SQLite database if using SQLite
if [ "$DB_CONNECTION" = "sqlite" ]; then
    echo "📊 Creating SQLite database..."
    touch /tmp/database.sqlite
fi

# Cache Laravel configurations
echo "⚡ Caching configurations..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Create storage symlink
echo "🔗 Creating storage symlink..."
php artisan storage:link

echo "✅ Deployment completed successfully!"
