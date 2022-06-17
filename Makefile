init: docker-build docker-up \
	backend-composer-install backend-make-env backend-generate-key backend-generate-jwt-secret backend-migrations
up: docker-up
down: docker-down
restart: down up

docker-up:
	docker compose up -d

docker-down:
	docker compose down --remove-orphans

docker-down-clear:
	docker compose down -v --remove-orphans

docker-build:
	docker compose build

backend-composer-install:
	docker exec abelo-app composer install

backend-migrations:
	docker exec abelo-app php artisan migrate --seed

backend-make-env:
	docker exec abelo-app cp .env.example .env

backend-generate-key:
	docker exec abelo-app php artisan key:generate

backend-generate-jwt-secret:
	docker exec abelo-app php artisan jwt:secret
