#!/bin/sh

#Composer
echo "Installation des dépendances..."
composer install

#FPM
exec php-fpm
