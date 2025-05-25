# Usa a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Instala dependências necessárias
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip unzip git curl \
    && docker-php-ext-install pdo pdo_pgsql zip

# Habilita o mod_rewrite (necessário para Laravel)
RUN a2enmod rewrite

# Copia os arquivos da aplicação
COPY . /var/www/html

# Define o diretório de trabalho
WORKDIR /var/www/html

# Ajusta o DocumentRoot para a pasta 'public'
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Permissões para pastas necessárias
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Copia o Composer do container oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instala dependências PHP/Laravel
RUN composer install --no-dev --optimize-autoloader

# Gera a chave do app (só se APP_KEY não estiver setada no ambiente)
RUN php artisan config:clear && \
    php artisan key:generate && \
    php artisan migrate --force

# Expõe a porta padrão do Apache
EXPOSE 80

# Comando padrão para iniciar o Apache
CMD ["apache2-foreground"]
