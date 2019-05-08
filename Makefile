.PHONY: init
init:
	vagrant ssh -- "cd /cafeteria && yarn"
	vagrant ssh -- "cd /cafeteria && yarn run dev"
	vagrant ssh -- "cd /cafeteria && composer install"
	vagrant ssh -- "cp /cafeteria/.env.example /cafeteria/.env"
	vagrant ssh -- "cd /cafeteria && php artisan key:generate"

.PHONY: migrate
migrate:
	vagrant ssh -- "cd /cafeteria && php artisan migrate:fresh"
	vagrant ssh -- "cd /cafeteria && php artisan migrate"
	vagrant ssh -- "cd /cafeteria && php artisan db:seed"

.PHONY: build-sass
build-sass:
	vagrant ssh -- "cd /cafeteria && yarn run dev"

.PHONY: serve
serve:
	vagrant ssh -- "cd /cafeteria && php artisan serve --host 0.0.0.0 &" &

.PHONY: kill
kill:
	vagrant ssh -- "pkill -u vagrant" 2>/dev/null; true
