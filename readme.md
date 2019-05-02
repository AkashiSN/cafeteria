# Cafeteria

## Requirement

- PHP >= 7.1.3
    - OpenSSL PHP Extension
    - PDO PHP Extension
    - Mbstring PHP Extension
    - Tokenizer PHP Extension
    - XML PHP Extension
    - Ctype PHP Extension
    - JSON PHP Extension
    - BCMath PHP Extension
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

## Install dependency

```
$ composer install
$ yarn
```

## Run in the browser

```
$ php artisan serve
Laravel development server started: <http://127.0.0.1:8000>
```
