# TimeLife

## Description

Galerie photo collaborative sous forme de timeline

## Installation

1. Clone laradock
```
git submodule update --init laradock/
```

2. In the laradock folder
```
cp .env.example .env
```
3. Change these infos in the .env
```
COMPOSE_PROJECT_NAME=timelife
PHP_VERSION=7.4
...
MYSQL_DATABASE=timelife
MYSQL_USER=homestead
MYSQL_PASSWORD=secret
...
NGINX_HOST_HTTP_PORT=8000
```
4. Run the docker container
```
docker-compose up -d nginx mysql workspace
```
5. Enter the workspace
```
docker-compose exec workspace bash
```
6. Install packages
```bash
# For php
composer install
# For JS
npm install
```
7. ???
8. Profit
