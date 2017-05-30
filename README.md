Image manager based on PHP 7, [Slim](http://www.slimframework.com/) and [Vue.js](http://vuejs.org/).

## Shorttags

## Installation

### Docker

```
docker run --link mysql -e MD_MYSQL_HOST=mysql -p 80:80 agaripian/betest
```

Available environment variables are:

* `MD_MYSQL_HOST` (default: `mysql`)
* `MD_MYSQL_USERNAME` (default: `root`)
* `MD_MYSQL_PASSWORD` (default: `password`)
* `MD_MYSQL_DATABASE` (default: `behance`)

### Manual Installation

#### Requirements

* PHP 7.0 and higher
* MySQL 5.1 and higher
* [Composer](http://getcomposer.org/)
* [npm](https://www.npmjs.com/)

#### Instructions

```sh
wget https://github.com/agaripian/betest/archive/<LATEST_VERSION>.tar.gz
tar xzf <LATEST_VERSION>.tar.gz
cd betest-<LATEST_VERSION>
composer install
cp config.sample.php config.php
vim config.php
npm install
npm run build
php vendor/bin/phinx migrate -e prod
php -S localhost:9000 -t ./public
```

## Upgrade

```sh
php vendor/bin/phinx migrate -e prod
```

## Set up development environment

```sh
git clone git@github.com:agaripian/betest.git
cd betest
composer install
cp config.sample.php config.php
vim config.php
npm install
php vendor/bin/phinx migrate -e dev
php -S 127.0.0.1:9000 -t ./public &
npm start
```

Open http://localhost:8080/ or http://localhost:8080/webpack-dev-server/
 
### Running test

#### Backend

```sh
composer install
php -S localhost:9000 -t ./public &
vim codeception.yml
php vendor/bin/codecept run
php vendor/bin/phpcs --standard=PSR2 backend/ public/api/index.php 
```

#### Frontend

```sh
npm install
npm start
```

## Changelog

See `CHANGELOG.md`

