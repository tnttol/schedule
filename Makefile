up:
	cd laradock ; docker-compose up -d workspace php-worker php-fpm
down:
	cd laradock ; docker-compose down -v
env:
	cd laradock ; rm .env ; cp .env.schedule .env
build:
	cd laradock ; docker system prune -a ; docker-compose build --no-cache workspace php-worker php-fpm
build-mysql:
	cd laradock ; docker-compose build --no-cache mysql
bash:
	cd laradock ; docker-compose exec --user=laradock workspace bash
install:
	cd laradock ; docker-compose exec --user=laradock workspace bash -c "composer install"
test:
	cd laradock ; docker-compose exec --user=laradock workspace bash -c "bin/console app:test"
cache-clear:
	cd laradock ; docker-compose exec --user=laradock workspace bash -c "bin/console cache:clear"
git-pull:
	git pull

restart: down up
pull: git-pull install
