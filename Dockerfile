FROM php:8.4-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git curl unzip libpq-dev zip libicu-dev \
    && docker-php-ext-install pdo pdo_pgsql intl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
