# Cafeteria

## 依存関係

### 本番環境

- PHP >= 7.0.0
    - OpenSSL PHP Extension
    - PDO PHP Extension
    - Mbstring PHP Extension
    - Tokenizer PHP Extension
    - XML PHP Extension
    - JSON PHP Extension
    - PostgreSQL PHP Extension

### 開発環境

- Vagrant
- VirtualBox

## 開発する

### VMを起動する

```bash
$ vagrant up   #start
$ vagtant halt #stop
```

### 依存関係をインストール

```bash
$ make init-vagrant
```

### .envの設定

"Google OAuth 2.0 Client ID"をセットする

```bash
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
GOOGLE_CALLBACK_URL=
```

### データベースのマイグレーション

```bash
$ make migrate-vagrant
```

### Sassのビルド

```bash
$ make build-sass-vagrant
```

### ブラウザで試す

```bash
$ make serve-vagrant  #start
Laravel development server started: <http://0.0.0.0:8000>
$ make kill-vagrant   #stop
```

## デプロイする

```bash
$ make deploy
```
この後にアクセスせずにすぐに.envのパスワードを更新してマイグレーションする。

```bash
$ make deploy-migrate
```
