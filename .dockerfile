FROM php:8.4-apache

# Install ekstensi database yang dibutuhkan CI4
RUN docker-php-ext-install pdo_mysql mysqli

# Aktifkan mod rewrite untuk CI4
RUN a2enmod rewrite

# Copy source code
COPY . /var/www/html
WORKDIR /var/www/html

# Permission
RUN chown -R www-data:www-data /var/www/html
