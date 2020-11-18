SHELL=/bin/bash
PROJECT_DIRECTORY := $(shell pwd)

local-install-composer:
	curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

local-install:
	@echo "Make sure you have composer installed. Run sudo make install-composer to install it."
	rm -rf vendor
	composer install

local-start:
	@echo "Starting symfony server"
	symfony server:start --no-tls -d
	@echo "Done. 127.0.0.1:8000 Open for requests"

local-stop:
	@echo "Stopping symfony server"
	symfony server:start -d
	@echo "Done"

local-tests:
	vendor/phpunit/phpunit/phpunit

docker-install:
	@echo "Make sure you have docker installed. Check internet on how to install it on your OS."
	docker build . -f cicd/Dockerfile -t cesc-docler


docker-start:
	@echo "Starting cesc-docler image"
	docker run -p 8000:8000 --name cesc-docler -d cesc-docler symfony server:start --no-tls
	@echo "Done. 127.0.0.1:8000 Open for requests"

docker-stop:
	docker stop cesc-docler
	@echo "Done"



