## Vagrant

.PHONY: init-vagrant
init-vagrant:
	vagrant ssh -- "rm -rf cafeteria/vendor"
	vagrant ssh -- "rm -rf cafeteria/node_modules"
	vagrant ssh -- "cd /cafeteria && yarn"
	vagrant ssh -- "cd /cafeteria && yarn run dev"
	vagrant ssh -- "cd /cafeteria && composer install"
	vagrant ssh -- "cp /cafeteria/.env.example /cafeteria/.env"
	vagrant ssh -- "cd /cafeteria && php artisan key:generate"

.PHONY: migrate-vagrant
migrate-vagrant:
	vagrant ssh -- "cd /cafeteria && php artisan migrate:fresh"
	vagrant ssh -- "cd /cafeteria && php artisan db:seed"

.PHONY: build-sass-vagrant
build-sass-vagrant:
	vagrant ssh -- "cd /cafeteria && yarn run dev"

.PHONY: watch-vagrant
watch-vagrant:
	vagrant ssh -- "cd /cafeteria && yarn run watch"

.PHONY: serve-vagrant
serve-vagrant:
	vagrant ssh -- "cd /cafeteria && php artisan serve --host 0.0.0.0 &" &

.PHONY: kill-vagrant
kill-vagrant:
	vagrant ssh -- "pkill -u vagrant" 2>/dev/null; true

.PHONY: repl-vagrant
repl-vagrant:
	vagrant ssh -- "cd /cafeteria && php artisan tinker"

.PHONY: cache-clear-vagrant
cache-clear-vagrant:
	vagrant ssh -- "cd /cafeteria && php artisan config:cache"

.PHONY: dump-autoload-vagrant
dump-autoload-vagrant:
	vagrant ssh -- "cd /cafeteria && composer dump-autoload"


## Local

.PHONY: init
init: yarn build-sass composer
	cp .env.example .env
	php artisan key:generate

.PHONY: yarn
yarn:
	yarn

.PHONY: build-sass
build-sass:
	yarn run prod

.PHONY: watch
watch:
	yarn run watch

.PHONY: composer
composer:
	composer install

.PHONY: migrate
migrate:
	php artisan migrate:fresh
	php artisan db:seed

.PHONY: serve
serve:
	php artisan serve --host 0.0.0.0

.PHONY: repl
repl:
	php artisan tinker

.PHONY: cache-clear
cache-clear:
	php artisan config:cache

.PHONY: dump-autoload
dump-autoload:
	composer dump-autoload


## Deploy

.PHONY: deploy
deploy:
	ssh radish -- "rm -rf public_html"
	ssh radish -- "rm -rf cafeteria"

	ssh radish -- "git clone git@github.com:AkashiSN/cafeteria.git"

	ssh radish -- "ln -s cafeteria/public public_html"
	ssh radish -- "cp cafeteria/.env.example cafeteria/.env"
	ssh radish -- "chmod -R 777 cafeteria/public"
	ssh radish -- "chmod -R 777 cafeteria/storage"
	ssh radish -- "chmod -R 777 cafeteria/bootstrap/cache"

	ssh radish -- "source ~/.bash_profile; cd cafeteria; yarn"
	ssh radish -- "source ~/.bash_profile; cd cafeteria; yarn run prod"
	ssh radish -- "source ~/.bash_profile; cd cafeteria; composer install --no-dev"

	ssh radish -- "cd cafeteria; php artisan key:generate"

.PHONY: deploy-migrate
deploy-migrate:
	ssh radish -- "cd cafeteria; php artisan migrate:fresh --force"
	ssh radish -- "cd cafeteria; php artisan db:seed --force"

