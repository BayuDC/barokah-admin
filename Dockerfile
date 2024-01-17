FROM oven/bun:1 AS assets

WORKDIR /tmp

COPY . .

RUN bun install && bun run build

FROM php:8.2-apache

USER root

WORKDIR /var/www

RUN apt-get update && apt-get install -y libpng-dev zlib1g-dev libxml2-dev \
    libzip-dev libonig-dev zip curl unzip 
RUN docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd pdo_mysql mysqli zip \
    && docker-php-source delete

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN a2enmod rewrite 

COPY . .
COPY --from=assets /tmp/public/build /var/www/public/build   

RUN chown -R www-data:www-data /var/www
RUN composer install



