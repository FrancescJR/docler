#!/bin/bash

bin/console doctrine:database:create --if-not-exists

bin/console doctrine:schema:update --force

bin/console --no-interaction doctrine:migrations:migrate

docker-php-entrypoint php-fpm
