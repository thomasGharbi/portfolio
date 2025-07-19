FROM php:8.4-fpm-alpine

ARG UID=1000
ARG GID=1000

RUN addgroup -g ${GID} appgroup \
 && adduser -u ${UID} -G appgroup -h /home/appuser -s /bin/sh -D appuser

RUN apk add --no-cache \
    bash \
    git \
    unzip \
    curl \
    libpq \
    libpq-dev \
    oniguruma-dev \
    icu-dev \
    zlib-dev \
    libzip-dev \
 && docker-php-ext-install intl pdo pdo_pgsql zip opcache

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/portfolio

COPY ./php/scripts/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

USER appuser

ENV PATH="/usr/local/bin:/usr/local/sbin:/usr/sbin:/usr/bin:/sbin:/bin:$PATH"

EXPOSE 9000
CMD ["php-fpm"]
