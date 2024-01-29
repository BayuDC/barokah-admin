FROM php:8.2-apache AS base 

USER root

RUN apt-get update && apt-get install -y libpng-dev zlib1g-dev libxml2-dev \
    libzip-dev libonig-dev zip curl unzip 
RUN docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd pdo_mysql mysqli zip \
    && docker-php-source delete

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN a2enmod rewrite 

FROM oven/bun:1 AS build

WORKDIR /tmp

COPY . .

RUN bun install && bun run build

FROM base

WORKDIR /var/www

COPY . .
COPY --from=build /tmp/public/build /var/www/public/build   

ENV COMPOSER_ALLOW_SUPERUSER=1 
RUN chown -R www-data:www-data /var/www
RUN composer install

RUN sed -i '/abort_unless/s/^/#/' /var/www/vendor/livewire/livewire/src/Features/SupportFileUploads/FileUploadController.php 
RUN sed -i '/abort_unless/s/^/#/' /var/www/vendor/livewire/livewire/src/Features/SupportFileUploads/FilePreviewController.php 



