up:
	cd laradock ; docker-compose up -d mysql workspace php-worker php-fpm nginx
down:
	cd laradock ; docker-compose down -v
restart: down up
build:
	cd laradock ; docker system prune -a ; docker-compose build --no-cache mysql workspace php-worker php-fpm nginx
bash:
	cd laradock ; docker-compose exec --user=laradock workspace bash
