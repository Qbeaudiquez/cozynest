# Utiliser l'image PHP-FPM officielle
FROM php:8.3-fpm

# Installer les dépendances requises
RUN apt-get update && apt-get install -y nginx libmongoc-dev librabbitmq-dev gettext

# Installer et activer l'extension MongoDB
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Installer l'extension pdo_mysql
RUN docker-php-ext-install pdo_mysql

# Copier les fichiers de configuration et de code
COPY ./config/nginx.conf.template /etc/nginx/nginx.conf.template
COPY ./frontend /frontend
COPY ./backend /backend

# Copier le script de démarrage
COPY ./start.sh /start.sh
RUN chmod +x /start.sh

# Définir la variable d'environnement PORT
ENV PORT=8080

# Exposer le port 80
EXPOSE 80

# Démarrer Nginx et PHP-FPM
CMD ["/start.sh"]