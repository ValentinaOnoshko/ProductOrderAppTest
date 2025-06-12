# Используем официальный образ PHP с FPM
FROM php:8.1-fpm

# Устанавливаем системные зависимости
RUN apt-get update && apt-get install -y --no-install-recommends \
        curl \
        git \
        zip \
        unzip \
        libpng-dev \
        libonig-dev \
        libxml2-dev \
        default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd xml

# Устанавливаем composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Создаем рабочую директорию
WORKDIR /var/www/html

# Копируем файлы проекта
COPY . .

# Устанавливаем зависимости
RUN composer install --optimize-autoloader --no-dev

# Делаем пользователя www-data владельцем файлов
USER www-data
