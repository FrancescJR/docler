FROM php:7.4-cli

#just need PHP installed.


#install php extension for symfony to work
WORKDIR /app
ADD https://raw.githubusercontent.com/mlocati/docker-php-extension-installer/master/install-php-extensions /usr/local/bin/

RUN chmod uga+x /usr/local/bin/install-php-extensions && sync \
    && install-php-extensions \
    zip \
    && rm -rf /var/cache/apk/* /tmp/* /var/www/html

RUN curl -sS https://get.symfony.com/cli/installer | bash \
    &&  mv /root/.symfony/bin/symfony /usr/local/bin/symfony

COPY . .

# Composer Dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-dev \
    && rm -rf /usr/local/bin/composer;
