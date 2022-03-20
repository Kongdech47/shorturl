FROM php:7.4.24-apache

USER root

WORKDIR /var/www/html

RUN apt-get update
RUN apt-get upgrade -y

RUN apt-get install --fix-missing -y libpq-dev
RUN apt-get install --no-install-recommends -y libpq-dev
RUN apt-get install -y libxml2-dev libbz2-dev zlib1g-dev

RUN apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libgd-dev
# RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-configure gd --with-jpeg=/usr/include/ --with-freetype=/usr/include/
RUN docker-php-ext-install gd

RUN apt-get -y install libsqlite3-dev libsqlite3-0 mariadb-client curl exif ftp
RUN docker-php-ext-install intl
RUN apt-get -y install --fix-missing zip unzip \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli
# RUN apt-get update
# RUN apt-get install -y libpq-dev
# RUN apt-get install -y zlib1g-dev libzip-dev libpng-dev
# RUN apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libgd-dev
# RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
# RUN docker-php-ext-configure gd --with-jpeg=/usr/include/ --with-freetype=/usr/include/
# RUN docker-php-ext-install gd
# RUN docker-php-ext-install zip
# RUN docker-php-ext-install mysqli pdo pdo_mysql pdo_pgsql

COPY vhost.conf /etc/apache2/sites-available/000-default.conf

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite