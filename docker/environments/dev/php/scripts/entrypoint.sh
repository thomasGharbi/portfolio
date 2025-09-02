#!/bin/sh
set -e

echo "Installation des dépendances..."
composer install

php bin/console doctrine:database:create --if-not-exists

exec php-fpm
