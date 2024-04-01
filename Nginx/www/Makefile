run:
	@cd ../../
	docker-compose up -d

build:
	@cd ../../
	docker-compose up -d --build

exec:
	docker exec -it cv-app bash

lint-fix:
	docker exec -it cv-app ./vendor/bin/phpcbf app

cs-fix:
	docker exec -it cv-app ./vendor/bin/php-cs-fixer fix app -v
