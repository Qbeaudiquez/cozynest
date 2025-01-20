# Utiliser une image PHP avec FPM
FROM php:8.3-fpm

# Installer les dépendances nécessaires
RUN apt-get update && apt-get install -y nginx libmongoc-dev librabbitmq-dev

# Installer MongoDB
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Installer PDO pour MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Copier la configuration Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# Copier le code de l'application
COPY ./frontend /frontend
COPY ./backend /backend

EXPOSE 80

# Lancer Nginx et PHP-FPM
USER root
CMD ["sh", "-c", "php-fpm & nginx -g 'daemon off;'"]
