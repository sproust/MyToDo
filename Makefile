# Start dev environment
up:
	docker-compose -f .docker/docker-compose.yml up -d;
	@echo 'App is running on http://localhost';

# Start dev environment with forced build
up\:build:
	docker-compose -f .docker/docker-compose.yml up -d --build;

# Stop dev environment
down:
	docker-compose -f .docker/docker-compose.yml down;

# Show logs - format it using less
logs:
	docker-compose -f .docker/docker-compose.yml logs -f --tail=10 | less -S +F;

# Exec sh on php container
exec\:php:
	docker-compose -f .docker/docker-compose.yml exec php sh;

init:
	docker-compose -f .docker/docker-compose.yml exec php composer install
	docker-compose -f .docker/docker-compose.yml exec php bin/console orm:generate-proxies
	docker-compose -f .docker/docker-compose.yml exec php bin/console migrations:migrate --no-interaction