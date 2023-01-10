FROM php:8.1.12
COPY composer*.json /var/www/
WORKDIR /var/www
RUN apt-get update && apt-get install -y \
    build-essential \
        libzip-dev \
        libpng-dev \
        libjpeg62-turbo-dev \
        libfreetype6-dev \
        libonig-dev \
        locales \
        zip \
        jpegoptim optipng pngquant gifsicle \
        vim \
        git \
        curl

# Instalamos extensiones de PHP
RUN docker-php-ext-install pdo_mysql zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd
# Instalamos composer
RUN curl -sS <https://getcomposer.org/installer> | php -- --install-dir=/usr/local/bin --filename=composer
# Instalamos dependendencias de composer
RUN composer install --no-ansi --no-dev --no-interaction --no-progress --optimize-autoloader --no-scripts
# Copiamos todos los archivos de la carpeta actual de nuestra
# computadora (los archivos de laravel) a /var/www/
COPY . /var/www/

# Exponemos el puerto 9000 a la network
EXPOSE 9000

# Corremos el comando php-fpm para ejecutar PHP
CMD [""php-fpm""]
