FROM php:8.2-apache

# Instala extensões e dependências
RUN apt-get update && apt-get install -y \
    libpq-dev libzip-dev zip unzip git curl \
    && docker-php-ext-install pdo pdo_pgsql zip

# Habilita o mod_rewrite do Apache
RUN a2enmod rewrite

# Copia o código do projeto
COPY . /var/www/html

# Define o diretório de trabalho
WORKDIR /var/www/html

# Ajusta o DocumentRoot para /public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Ajusta permissões
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Copia o Composer do container oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instala dependências do Laravel
RUN composer install --no-dev --optimize-autoloader

# Expõe a porta padrão do Apache
EXPOSE 80

# Comando de inicialização
CMD php artisan config:clear && \
    php artisan migrate --force && \
    apache2-foreground
