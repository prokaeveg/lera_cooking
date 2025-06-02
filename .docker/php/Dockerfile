FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    git zip unzip curl libpq-dev libicu-dev libzip-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install pdo pdo_pgsql intl zip

# Установка Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www