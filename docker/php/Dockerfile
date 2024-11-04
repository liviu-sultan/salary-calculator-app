FROM php:8.3-fpm-alpine

WORKDIR /var/www/app

RUN apk -U upgrade --no-cache

RUN apk add --update --no-cache bash \
    mysql-client \
    icu-libs \
    oniguruma-dev && \
    docker-php-ext-install pdo_mysql && \
    docker-php-ext-enable pdo_mysql

RUN chown -R www-data:www-data /var/www/app

CMD ["php-fpm", "-F"]
