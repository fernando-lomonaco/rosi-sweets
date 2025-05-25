# Use uma imagem PHP oficial com Apache
FROM php:8.2-apache

# Instalar extensões necessárias
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip unzip \
    && docker-php-ext-install pdo pdo_pgsql zip

# Ativar mod_rewrite do Apache
RUN a2enmod rewrite

# Copiar o código do projeto para o container
COPY . /var/www/html

# Ajustar permissões
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Instalar composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Rodar composer install
RUN composer install --no-dev --optimize-autoloader

# Expor a porta 80
EXPOSE 80

# Comando para rodar o Apache no foreground
CMD ["apache2-foreground"]
