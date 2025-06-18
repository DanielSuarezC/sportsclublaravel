# Etapa 1: Build
FROM composer:2.7 AS build

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader

# Etapa 2: Producción
FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql zip

COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer
COPY --from=build /app /var/www

WORKDIR /var/www

ENV APP_ENV=production
ENV APP_DEBUG=false

EXPOSE 10000

# Comando de inicio: genera cachés, aplica migraciones y levanta el servidor
CMD ["sh", "-c", "php artisan config:cache && php artisan route:cache && php artisan view:cache && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=10000"]
