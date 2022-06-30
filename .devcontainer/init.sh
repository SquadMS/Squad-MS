#!/usr/bin/env bash

# Configure environment (if it is not already configured)
if [ ! -f .env ]
then
    cp .env.example .env
    
    # Set APP_KEY
    sed "s/^APP_KEY=/APP_KEY=base64:ZEKyyTRYfKC9pYEQuxMEDA4PN6qwxyyhkOibrOMr1s4=/" .env
    
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
