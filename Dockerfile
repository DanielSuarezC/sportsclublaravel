# Etapa 1: Construcción
FROM composer:2.7 AS build

WORKDIR /app

# Copiar archivos necesarios y ejecutar composer
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader

# Copiar el resto del código del proyecto
COPY . .

# Etapa 2: Producción
FROM php:8.2-cli

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql zip

# Copiar Composer desde imagen anterior
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Copiar la app desde la etapa de build
COPY --from=build /app /var/www

WORKDIR /var/www

# Variables de entorno opcionales
ENV APP_ENV=production
ENV APP_DEBUG=false

# Exponer el puerto 10000 (Render espera esto)
EXPOSE 10000

# Generar cache de configuración
RUN php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# Comando por defecto
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
