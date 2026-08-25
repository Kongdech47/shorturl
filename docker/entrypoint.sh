#!/bin/sh
set -eu

cd /var/www/html

if [ -f composer.json ] && [ ! -f vendor/autoload.php ]; then
    echo "Installing Composer dependencies..."
    composer install --no-interaction --prefer-dist
fi

exec "$@"
