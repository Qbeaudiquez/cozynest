FROM php:8.3-fpm

RUN apt-get update && apt-get install -y libmongoc-dev librabbitmq-dev

RUN pecl install mongodb

RUN docker-php-ext-enable mongodb

RUN docker-php-ext-install pdo pdo_mysql
