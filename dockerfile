# Usa uma imagem oficial do PHP com extensões necessárias
FROM php:8.3-fpm

# Instala dependências do Laravel
RUN apt-get update && apt-get install -y \
    zip unzip curl git \
    libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define o diretório do Laravel
WORKDIR /var/www

# Copia os arquivos do Laravel
COPY . .

# Exibe a versão do PHP (para conferência)
RUN php -v

# Instala as dependências do Laravel
RUN composer install --no-dev --optimize-autoloader

# Permite que o Laravel acesse permissões de arquivos necessários
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Exposição da porta
EXPOSE 9000

# Comando padrão
CMD ["php-fpm"]
