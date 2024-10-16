# Use PHP 7.4 with Apache as the base image
FROM php:7.4-apache

# Install mysqli extension
RUN apt-get update
RUN apt-get install --yes --force-yes cron g++ gettext libicu-dev openssl libc-client-dev libkrb5-dev libxml2-dev libfreetype6-dev libgd-dev libmcrypt-dev bzip2 libbz2-dev libtidy-dev libcurl4-openssl-dev libz-dev libmemcached-dev libxslt-dev

RUN a2enmod rewrite

RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli

# Copy the application source code to the Apache document root
COPY ./src/ /var/www/html/

# Change ownership of the files to the www-data user for proper web server access
RUN chown -R www-data:www-data /var/www/html/

# Update database connection string to point to Kubernetes service 'mysql-service'
# This assumes you have a configuration file where DB_HOST is defined
RUN sed -i 's/DB_HOST=.*/DB_HOST=mysql-service/' /var/www/html/config.php

# Expose port 80 to allow traffic to the Apache web server
EXPOSE 80

# Start Apache server in the foreground
CMD ["apache2-foreground"]
