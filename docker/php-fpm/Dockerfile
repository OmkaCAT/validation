FROM php:8.3-fpm-alpine

WORKDIR /var/www

ENV COMPOSER_HOME="/tmp/composer"
COPY --from=composer:2.6.6 /usr/bin/composer /usr/bin/composer
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions https://github.com/xdebug/xdebug/archive/refs/tags/3.3.1.tar.gz \
    && docker-php-ext-enable xdebug

COPY conf.d/local.ini /usr/local/etc/php/conf.d/local.ini
COPY conf.d/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

USER appuser:appuser

CMD ["php-fpm"]
