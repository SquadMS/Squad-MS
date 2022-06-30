#!/usr/bin/env bash

# Install Packagist dependencies and run scripts
composer install

# Install NPM dependencies and build assets
npm install
npm run dev