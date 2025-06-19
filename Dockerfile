FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_mysql

# Copia os arquivos do projeto
COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html