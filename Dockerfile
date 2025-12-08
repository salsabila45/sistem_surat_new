FROM php:8.4-apache

# Install ekstensi database yang dibutuhkan CI4 + MySQL
RUN docker-php-ext-install pdo_mysql mysqli

# Aktifkan mod rewrite untuk CI4
RUN a2enmod rewrite

# Set document root ke folder public CI4
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copy source code
COPY . /var/www/html
WORKDIR /var/www/html

# Permission
RUN chown -R www-data:www-data /var/www/html
