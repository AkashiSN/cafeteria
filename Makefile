.PHONY: init-dev
init-dev:
	vagrant ssh -- "rm -rf cafeteria/vendor"
	vagrant ssh -- "rm -rf cafeteria/node_modules"
	vagrant ssh -- "cd /cafeteria && yarn"
	vagrant ssh -- "cd /cafeteria && yarn run dev"
	vagrant ssh -- "cd /cafeteria && composer install"
	vagrant ssh -- "cp /cafeteria/.env.example /cafeteria/.env"
	vagrant ssh -- "cd /cafeteria && php artisan key:generate"

.PHONY: migrate-dev
migrate-dev:
	vagrant ssh -- "cd /cafeteria && php artisan migrate:fresh"
	vagrant ssh -- "cd /cafeteria && php artisan db:seed"

.PHONY: build-sass-dev
build-sass-dev:
	vagrant ssh -- "cd /cafeteria && yarn run dev"

.PHONY: serve-dev
serve-dev:
	vagrant ssh -- "cd /cafeteria && php artisan serve --host 0.0.0.0 &" &

.PHONY: kill-dev
kill-dev:
	vagrant ssh -- "pkill -u vagrant" 2>/dev/null; true

.PHONY: init
init: yarn build-sass composer
	.env.example .env
	php artisan key:generate"

.PHONY: yarn
yarn:
	yarn

.PHONY: migrate
migrate:
	php artisan migrate:fresh
	php artisan db:seed

.PHONY: build-sass
build-sass:
	yarn run prod

.PHONY: composer
composer:
	composer install

.PHONY: serve-dev
serve:
	php artisan serve --host 0.0.0.0

.PHONY: deploy
deploy:
	rm -rf deploy
	git clone git@github.com:AkashiSN/cafeteria.git deploy/laravel
	mv deploy/laravel/public deploy/public_html
	rm -rf deploy/laravel/docs
	rm -rf deploy/laravel/.git
	ssh radish -- "rm -rf public_html"
	ssh radish -- "rm -rf laravel"
	sed -e 's#'/../vendor/autoload.php'#'/../laravel/vendor/autoload.php'#g' public/index.php |	sed -e 's#'/../bootstrap/app.php'#'/../laravel/bootstrap/app.php'#g' > deploy/public_html/index.php

	scp -r deploy/public_html/ radish:
	scp -r deploy/laravel/ radish:

	ssh radish -- "source ~/.bash_profile; cd laravel; yarn"
	ssh radish -- "source ~/.bash_profile; cd laravel; yarn run prod"
	ssh radish -- "source ~/.bash_profile; cd laravel; composer install"
	ssh radish -- "source ~/.bash_profile; cd laravel; cp .env.example .env"
	ssh radish -- "source ~/.bash_profile; cd laravel; php artisan key:generate"
	ssh radish -- "source ~/.bash_profile; cd laravel; php artisan migrate:fresh"
	ssh radish -- "source ~/.bash_profile; cd laravel; php artisan db:seed"

