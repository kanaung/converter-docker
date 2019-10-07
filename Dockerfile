FROM php:7.2-apache

COPY limits.ini /usr/local/etc/php/conf.d/
# COPY opcache.ini /usr/local/etc/php/conf.d/
COPY converter/ /var/www/html/
COPY api.php /var/www/html/api.php

RUN chown -Rf /var/www/html

EXPOSE 80
