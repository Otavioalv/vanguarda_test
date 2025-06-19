FROM php:8.2-apache

# Habilita PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Copia os arquivos do projeto
COPY . /var/www/html/

# Dá permissões básicas
RUN chown -R www-data:www-data /var/www/html