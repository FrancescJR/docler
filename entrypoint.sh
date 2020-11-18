#!/bin/bash

bin/console doctrine:database:create --if-not-exists

docker-php-entrypoint php-fpm
