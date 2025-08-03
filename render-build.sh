#!/usr/bin/env bash
# Render.com deployment script for Laravel

set -e

echo "🚀 Starting Laravel deployment on Render..."

# Install PHP dependencies
echo "📦 Installing Composer dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction

# Set proper permissions
chmod -R 775 storage bootstrap/cache

# Generate app key if not exists
if [ -z "$APP_KEY" ]; then
    echo "🔑 Generating application key..."
    php artisan key:generate --force --no-interaction
fi

# Create SQLite database directory and file
echo "📊 Setting up SQLite database..."
mkdir -p database
touch database/database.sqlite
chmod 664 database/database.sqlite

# Clear and cache configurations for production
echo "⚡ Optimizing Laravel for production..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

php artisan config:cache
php artisan route:cache
php artisan view:cache

# Create storage symlink
echo "🔗 Creating storage symlink..."
php artisan storage:link || echo "Storage link already exists"

echo "✅ Laravel deployment completed successfully!"
echo "🌐 Your app will be available at the provided Render URL"
