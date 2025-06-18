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

# Crear archivo .env temporal si no existe
RUN test -f .env || cp .env.example .env

# Ejecutar comandos artisan que requieren .env
RUN php artisan key:generate && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

EXPOSE 10000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
