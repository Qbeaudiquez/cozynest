# Utiliser l'image PHP-FPM officielle
FROM php:8.3-fpm


RUN apt-get update && apt-get install -y nginx libmongoc-dev librabbitmq-dev gettext

RUN pecl install mongodb && docker-php-ext-enable mongodb

RUN docker-php-ext-install pdo_mysql

COPY ./config/nginx.conf.template /etc/nginx/nginx.conf.template

COPY ./frontend /frontend
COPY ./backend /backend

COPY ./start.sh /start.sh
RUN chmod +x /start.sh

ENV PORT=8080

EXPOSE 80

CMD ["/start.sh"]