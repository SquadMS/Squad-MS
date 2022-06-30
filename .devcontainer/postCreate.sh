#!/usr/bin/env bash

# Migrate the database
./artisan migrate

# Install Packagist dependencies and run scripts
composer install

# Install NPM dependencies and build assets
npm install
npm run dev