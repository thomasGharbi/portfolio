#!/bin/sh
set -e

echo "Installation des dépendances..."
composer install

exec php-fpm
