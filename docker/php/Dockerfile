FROM php:8.3-fpm-alpine

WORKDIR /var/www/app

RUN apk -U upgrade --no-cache

RUN apk add --update --no-cache bash

RUN chown -R www-data:www-data /var/www/app

CMD ["php-fpm", "-F"]
