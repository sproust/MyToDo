FROM php:8.0.3-fpm-alpine3.13

# Install Git
RUN apk update && apk upgrade && \
	apk add git

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /srv/

RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN php -v