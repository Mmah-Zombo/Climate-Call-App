#!/usr/bin/env bash

echo "Running composer..."
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html

echo "Generating application key..."
php artisan key:generate --show

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force

echo "Installing JavaScript dependencies..."
npm install --prefix /var/www/html

echo "Building Vite assets..."
npm run build --prefix /var/www/html

echo "Deployment complete!"