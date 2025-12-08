FROM php:8.4-apache

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# ✅ Install dependency untuk intl
RUN apt-get update && apt-get install -y libicu-dev

# ✅ Install ekstensi yang dibutuhkan CI4 + MySQL
RUN docker-php-ext-install intl pdo_mysql mysqli

RUN a2enmod rewrite

ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
 && sed -ri 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# ✅ Bind Apache ke PORT dari Railway
RUN sed -i 's/80/${PORT}/g' /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf

COPY . /var/www/html
WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html
