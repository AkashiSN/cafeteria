# Cafeteria

## Requirement

### Production

- PHP >= 7.0.0
    - OpenSSL PHP Extension
    - PDO PHP Extension
    - Mbstring PHP Extension
    - Tokenizer PHP Extension
    - XML PHP Extension
    - JSON PHP Extension
    - PostgreSQL PHP Extension

### Development

- Vagrant
- VirtualBox

## Preparing for VM

```
$ vagrant up #start
$ vagtant halt #stop
```

## Install dependency

```
$ make init
```

## Configure .env

Set the "Google OAuth 2.0 Client ID" into the below.

```
GOOGLE_CLIENT_ID =
GOOGLE_CLIENT_SECRET =
GOOGLE_CALLBACK_URL =
```

## Migrate & Seed database

```
$ make migrate
```

## Build sass

```
$ make build-sass
```

## Run in the browser

```
$ make serve
Laravel development server started: <http://127.0.0.1:8000>
$ make kill
```



