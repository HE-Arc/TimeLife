# TimeLife

## Description

Galerie photo collaborative sous forme de timeline

## Installation

1. Clone laradock
```
git submodule update --init laradock/
```

2. Copy Laravel configuration file
```
cp .env.example .env
```

3. **[Laradock]** Copy laradock configuration file
```
cp .env.example .env
```

4. Change these infos in the .env
```
COMPOSE_PROJECT_NAME=timelife
PHP_VERSION=7.4
...
PHP_FPM_INSTALL_EXIF=true
...
MYSQL_DATABASE=timelife
MYSQL_USER=homestead
MYSQL_PASSWORD=secret
...
NGINX_HOST_HTTP_PORT=8000
```

5. **[Laradock]** Run the docker container
```
docker-compose up -d nginx mysql workspace
```

6. **[Laradock]** Enter the workspace
```
docker-compose exec workspace bash
```

7. Install packages
```bash
# For php
composer install
# For JS
npm install
```

8. Generate an App key
```bash
php artisan key:generate
```

9. *[Optional]* If you already have  used Laradock on you computer. 
  - Enter the `mysql` docker container : `docker-compose exec mysql bash`
  - connect to mysql with `mysql -u root -p`. Password : `root`
  - Execute these command two command to create the database :
```mysql
CREATE DATABASE IF NOT EXISTS `timelife` COLLATE 'utf8_general_ci' ;
GRANT ALL ON `timelife`.* TO 'homestead'@'%' ;
```

10. ???
11. Profit
