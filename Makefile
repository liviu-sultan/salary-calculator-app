
DOCKER_COMPOSE=docker-compose -f docker/docker-compose.yaml
DOCKER_EXEC=docker exec
PHP_CONTAINER=salary-app-php
NODEJS_CONTAINER=salary-app-nodejs

deploy: docker-build docker-up composer-install npm-install npm-run-build

docker-build:
	$(DOCKER_COMPOSE) build
docker-up:
	$(DOCKER_COMPOSE) run salary-app
composer-install:
	$(DOCKER_EXEC) $(PHP_CONTAINER) php -d memory_limit=-1 composer.phar install --no-interaction --no-progress --optimize-autoloader --no-cache
docker-full-clean:
	$(DOCKER_COMPOSE) down --rmi local --volumes --remove-orphans
npm-install:
	$(DOCKER_EXEC) $(NODEJS_CONTAINER) npm install
npm-run-build:
	$(DOCKER_EXEC) $(NODEJS_CONTAINER) npm run build
