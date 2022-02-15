ps:
	docker-compose ps

cache:
	docker-compose exec app composer dump-autoload -o
	docker-compose exec app php artisan config:cache

#新規作成環境構築
standup:
	docker-compose up -d --build
#	docker-compose -p study up -d
	docker-compose exec app php artisan storage:link
	docker-compose exec app composer install
#	docker-compose exec app composer self-update --2
	docker-compose exec app composer require --dev beyondcode/laravel-dump-server:1.3.0
	docker-compose exec app composer require "doctrine/dbal:2.*"
	docker-compose exec app composer require nesbot/carbon
	docker-compose exec app apt update
	docker-compose exec app apt install nodejs npm
	docker-compose exec app npm install
	docker-compose exec app npm run dev
    #chat用 pusher laravel echo
    docker-compose exec app composer require laravel/ui:1.2.0
    docker-compose exec app php artisan ui vue --auth
    docker-compose exec app npm install
    docker-compose exec app npm run dev
    docker-compose exec app composer require pusher/pusher-php-server "~4.0"
    docker-compose exec app npm install --save laravel-echo pusher-js
    #chat用ここまで
    docker-compose exec app php artisan key:generate
	docker-compose exec app php artisan config:cache

init:
	docker-compose up -d --build
	docker-compose exec app php artisan storage:link
#	docker-compose exec app php artisan migrate:fresh --seed
	docker-compose exec app composer install
#	docker-compose exec app cp .env.example .env
	docker-compose exec app composer require --dev beyondcode/laravel-dump-server:1.3.0
	docker-compose exec app composer require "doctrine/dbal:2.*"
	docker-compose exec app composer require nesbot/carbon
	docker-compose exec app apt update
	docker-compose exec app apt install nodejs npm
	docker-compose exec app npm install
	docker-compose exec app npm run dev
	docker-compose exec app php artisan key:generate
	docker-compose exec app php artisan config:cache

start:
	docker-compose start
down:
	docker-compose down
restart:
	@make down
	@make up

up:
	docker-compose up -d
