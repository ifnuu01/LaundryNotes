FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libonig-dev libxml2-dev zip unzip curl npm git \
    && docker-php-ext-install pdo pdo_mysql

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install

RUN chmod -R 777 storage bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]

