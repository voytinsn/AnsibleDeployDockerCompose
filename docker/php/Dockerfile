FROM php:fpm-alpine
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
COPY app/ /var/www/example_app/