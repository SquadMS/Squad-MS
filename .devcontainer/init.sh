#!/usr/bin/env bash

# Configure environment (if it is not already configured)
if [ ! -f .env ]
then
    cp .env.example .env
    
    # Set APP_KEY
    sed -i "s/^APP_KEY=/APP_KEY=base64:ZEKyyTRYfKC9pYEQuxMEDA4PN6qwxyyhkOibrOMr1s4=/" .env

    # Enable xDebug
    sed -i "s/^SAIL_XDEBUG_MODE=/SAIL_XDEBUG_MODE=debug,develop,profile/" .env
    
    # Remove blank STEAM_API_KEY (Use GitHub Secrets)
    sed -i '/^STEAM_API_KEY=/d' .env
fi

