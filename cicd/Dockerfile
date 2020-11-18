ARG PHP_VERSION=7.4.8
ARG ALPINE_VERSION=3.12

FROM php:7.4.8-fpm-alpine3.12

#install php extension for symfony to work
WORKDIR /app
ADD https://raw.githubusercontent.com/mlocati/docker-php-extension-installer/master/install-php-extensions /usr/local/bin/

RUN chmod uga+x /usr/local/bin/install-php-extensions && sync \
    && install-php-extensions \
    zip \
    pdo_mysql \
    && rm -rf /var/cache/apk/* /tmp/* /var/www/html


COPY . .

# Composer Dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-dev \
    && rm -rf /usr/local/bin/composer;


EXPOSE 9000

CMD ["php-fpm"]
