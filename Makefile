SHELL=/bin/bash
PROJECT_DIRECTORY := $(shell pwd)

local-install-composer:
	curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

install:
	@echo "Make sure you have composer installed. Run sudo make install-composer to install it."
	rm -rf vendor
	rm composer.lock
	composer install
	@cd cicd/; docker-compose build
	docker network create docler || true

logs:
	cd cicd/; docker-compose logs -f


start:
	cd cicd/; docker-compose up -d
	@echo "Done. You can access this service at http://localhost:8000"

stop:
	cd cicd/; docker-compose -f docker-compose.yaml stop

test:
	vendor/phpunit/phpunit/phpunit




