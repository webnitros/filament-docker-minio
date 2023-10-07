#!/bin/bash

# Install composer dependencies
#composer install --no-dev --no-interaction --no-scripts

echo "SITE DEVELOPMENT"
echo "http://127.0.0.1:8401/"
echo "http://127.0.0.1:8401/admin"
echo "http://localhost:8401/mailhog"

echo "APP_ENV: $APP_ENV"
echo "APP_DEBUG: $APP_DEBUG"

#echo "Running queue"
#php artisan queue:work --queue=site_queue
#php artisan queue:work --queue=site_queue --tries=3

# Run migrations
php-fpm
