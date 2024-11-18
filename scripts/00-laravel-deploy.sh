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

# Install Node.js and NPM (if not already installed)
echo "Checking for Node.js installation..."
if ! command -v node >/dev/null 2>&1; then
    echo "Node.js not found. Installing Node.js..."
    # Using NodeSource Node.js Binary Distributions
    curl -fsSL https://deb.nodesource.com/setup_16.x | sudo -E bash -
    sudo apt-get install -y nodejs
else
    echo "Node.js is already installed."
fi

# Verify Node.js and NPM installation
node -v
npm -v

echo "Installing JavaScript dependencies..."
npm install

echo "Building Vite assets..."
npm run build

echo "Deployment complete!"