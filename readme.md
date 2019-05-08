# Cafeteria

## Requirement

- PHP >= 7.0.0
    - OpenSSL PHP Extension
    - PDO PHP Extension
    - Mbstring PHP Extension
    - Tokenizer PHP Extension
    - XML PHP Extension
    - JSON PHP Extension
    - PostgreSQL PHP Extension 
- Node.js >= 10.15.0
- Docker
- Composer
- yarn

## Preparing for Database
- Run
```
$ docker container run -d --rm --name postgres -e POSTGRES_USER=postgres -e POSTGRES_PASSWORD=password -p 5432:5432 postgres
```

- Stop
```
$ docker stop postgres
```

**When you stop the container, the container also remove itself. 
So, when restart container, you have to run Migrate & Seed.**

## Install dependency

```
$ composer install
$ yarn
```

## Configure .env

```
$ cp .env.example .env
$ php artisan key:generate
```

Set the "Google OAuth 2.0 Client ID" into the below.

```
GOOGLE_CLIENT_ID =
GOOGLE_CLIENT_SECRET =
GOOGLE_CALLBACK_URL =
```

## Migrate & Seed database

```
$ php artisan migrate
$ php artisan db:seed
```

## Build sass

```
$ yarn run dev
```

## Run in the browser

```
$ php artisan serve
Laravel development server started: <http://127.0.0.1:8000>
```

