#!/usr/bin/env bash

# Configure environment (if it is not already configured)
if [ ! -f .env ]
then
    cp .env.example .env
    
    # Remove blank APP_KEY (Use GitHub Secrets)
    sed '/^APP_KEY=/d' .env
    
    # Remove blank STEAM_API_KEY (Use GitHub Secrets)
    sed '/^STEAM_API_KEY=/d' .env
fi

# Install Packagist dependencies (without post-* scripts)
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --no-scripts --ignore-platform-reqs
