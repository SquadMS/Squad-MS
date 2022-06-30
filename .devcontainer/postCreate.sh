#!/usr/bin/env bash

# Configure environment (if it is not already configured)
if [ ! -f .env ]
then
    cp .env.example .env
fi

# Install Packagist dependencies (without post-* scripts)
composer install --no-scripts

# Install NPM dependencies and build assets
npm install
npm run dev