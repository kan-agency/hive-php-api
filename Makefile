##
# Applications
##
DOCKER                  ?= docker
DOCKER_COMPOSE          ?= docker-compose
CLI                     ?= ${DOCKER_COMPOSE} run --rm cli

##
# Composer
##
composer-install:
	${CLI} composer install

composer-update:
	${CLI} composer update

composer-autoload:
	${CLI} composer dump-autoload

composer-clean:
	rm -rf vendor

##
# Helpers
##
cs:
	${CLI} php vendor/bin/php-cs-fixer fix

test:
	${CLI} php vendor/bin/phpunit
