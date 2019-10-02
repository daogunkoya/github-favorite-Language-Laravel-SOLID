.PHONE: rebuild
rebuild:
	@docker-compose -p laravel-docker-boilerplate -f docker/docker-compose.yml down --remove-orphans
	@docker-compose -p laravel-docker-boilerplate -f docker/docker-compose.yml up -d --build
	@docker exec laravel-docker-boilerplate-web composer global require hirak/prestissimo
	@docker exec laravel-docker-boilerplate-web composer install --prefer-dist --no-suggest

.PHONE: down
down:
	@docker-compose -p laravel-docker-boilerplate -f docker/docker-compose.yml down --remove-orphans

.PHONE: restart
restart:
	@docker-compose -p laravel-docker-boilerplate -f docker/docker-compose.yml restart

.PHONE: status
status:
	@docker-compose -p laravel-docker-boilerplate -f docker/docker-compose.yml ps

.PHONE: shell
shell:
	@docker exec -it laravel-docker-boilerplate-web /bin/sh

.PHONE: stats
stats:
	@docker stats laravel-docker-boilerplate-web

.PHONE: logs
logs:
	@docker-compose -p laravel-docker-boilerplate -f docker/docker-compose.yml logs -f --tail=100

.PHONE: unit-tests
unit-tests:
	@docker exec laravel-docker-boilerplate-web vendor/bin/phpunit --configuration /app/phpunit.xml tests/Unit

.PHONE: feature-tests
feature-tests:
	@docker exec laravel-docker-boilerplate-web vendor/bin/phpunit --configuration /app/phpunit.xml tests/Feature
