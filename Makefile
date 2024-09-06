up:
	cd laradock ; docker-compose up -d mysql workspace php-worker php-fpm nginx
down:
	cd laradock ; docker-compose down -v
restart: down up
env:
	cd laradock ; rm .env ; cp .env.schedule .env
build:
	cd laradock ; docker system prune -a ; docker-compose build --no-cache mysql workspace php-worker php-fpm nginx
build-mysql:
	cd laradock ; docker-compose build --no-cache mysql
bash:
	cd laradock ; docker-compose exec --user=laradock workspace bash
test:
	cd laradock ; docker-compose exec --user=laradock workspace bash -c "bin/console app:test"
