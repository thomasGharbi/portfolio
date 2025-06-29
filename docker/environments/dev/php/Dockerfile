FROM php:8.4-fpm-alpine

RUN apk add --no-cache  \
    bash  \
    git  \
    unzip  \
    curl  \
    libpq  \
    libpq-dev  \
    oniguruma-dev  \
    icu-dev  \
    zlib-dev  \
    libzip-dev \
 && docker-php-ext-install intl pdo pdo_pgsql zip opcache

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/portfolio

COPY ../scripts/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 9000
CMD ["php-fpm"]
