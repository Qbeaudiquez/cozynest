# Utiliser une image PHP avec FPM
FROM php:8.3-fpm

# Installer les dépendances nécessaires pour MongoDB
RUN apt-get update && apt-get install -y libmongoc-dev librabbitmq-dev

# Installer MongoDB
RUN pecl install mongodb
RUN docker-php-ext-enable mongodb

# Installer PDO pour MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Installer Nginx et PHP-FPM
RUN apt-get install -y nginx

# Copier la configuration Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# Copier le code de l'application
COPY ./frontend /frontend
COPY ./backend /backend

# Exposer le port 80 (Nginx)
EXPOSE 80

# Démarrer Nginx et PHP-FPM
CMD service nginx start && php-fpm
