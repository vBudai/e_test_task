FROM php:8.4-fpm-bookworm

# Установка зависимостей
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev libzip-dev libpq-dev unzip \
    && docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd zip opcache \
    && rm -rf /var/lib/apt/lists/*

# Установка Xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug
COPY docker/php/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . .

# Установка зависимостей (с флагом --ignore-platform-reqs)
RUN composer install --no-dev --optimize-autoloader --no-interaction --ignore-platform-reqs

# Настройка прав
RUN mkdir -p var/cache var/log \
    && chown -R www-data:www-data var \
    && chmod -R 777 var/cache var/log
