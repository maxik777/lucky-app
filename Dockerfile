FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    unzip curl git sqlite3 libsqlite3-dev libzip-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install pdo pdo_sqlite zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install

CMD ["php-fpm"]
