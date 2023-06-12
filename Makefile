service=slim_php

build:
	@docker-compose up -d --build

start:
	@docker-compose up -d

stop:
	@docker-compose down

exec:
	@docker exec -it $(service) $$cmd

composer-install:
	@make exec cmd="composer install"

init-migrations:
	@make exec cmd="php vendor/bin/phoenix init"

run-migrations:
	@make exec cmd="php vendor/bin/phoenix migrate"

run-migrations-rollback:
	@make exec cmd="php vendor/bin/phoenix rollback"

seed:
	@make exec cmd="php database/seeders/Seeder.php"

phpcs:
	@make exec cmd="vendor/bin/phpcs --standard=PSR12 src"

phpunit:
	@make exec cmd="vendor/bin/phpunit --configuration tests/phpunit.xml"