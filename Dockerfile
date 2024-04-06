FROM php:8.2
RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#RUN docker-php-ext-install pdo mbstring

RUN docker-php-ext-install mysqli pdo_mysql

WORKDIR /app
COPY . /app

RUN composer install

# CMD php artisan serve --port=8182
EXPOSE 8182

# Use built-in PHP development server for development
CMD ["php", "-S", "0.0.0.0:8182", "-t", "/app/public"]                                                                                                                                               