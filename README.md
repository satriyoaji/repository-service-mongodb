# Laravel API Project with Repository-Service Pattern using MongoDB and Unit Tests Integrated
This repo is an example implementation of an API project with implement repository-service pattern, clean code, OOP, and strict class. This repo also provide unit tests in every layer to keep code coverage.

## Installation

#### Dependencies

[Laravel](https://laravel.com)

[MongoDB PHP Driver](https://www.mongodb.com/docs/drivers/php/#installation)

[Official PHP Page](http://php.net/manual/en/mongodb.installation.php)

#### Clone this repo


Enter this repo folder

``` bash
cd repository-service-mongodb
```

Install Dependencies

``` bash
composer install
```

#### Configuration

Generate .env file

```bash
cp .env.example .env
```

Generate APP_KEY

``` bash
php artisan key:generate
```

Database Instance -> you can run your own MongoDB 4.2 or bye using docker container below

``` bash
docker-compose up
```

Database Environment

``` bash
# Adjust your DB env dependencies
DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=37017
DB_DATABASE=laravel_service_repository
DB_USERNAME=root
DB_PASSWORD=password
 
# Add parameters into .env file
MONGO_HOST=127.0.0.1
MONGO_PORT=37017
MONGO_DATABASE=laravel_service_repository
MONGO_USERNAME=root
MONGO_PASSWORD=password
```

#### Run

``` bash
# cache clear environment file
php artisan config:clear

# Migration (if needed)
php artisan migrate

# Run API service
php artisan serve
```

## Features

### API Docs

#### 1. Lihat stok kendaraan
```
[GET] http://localhost:8000/api/bikes/{id} -> id kendaraan Motor
[GET] http://localhost:8000/api/cars/{id} -> id kendaraan Mobil
```

#### 2. Penjualan kendaraan
```
[POST] http://localhost:8000/api/bikes/{id}/sales -> id kendaraan Motor
[POST] http://localhost:8000/api/cars/{id}/sales -> id kendaraan Mobil
```

#### 3. Laporan penjualan per kendaraan
```
[GET] http://localhost:8000/api/bikes/{id}/sales -> id kendaraan Motor
[GET] http://localhost:8000/api/cars/{id}/sales -> id kendaraan Mobil
```

#### 4. CRUD Motor
```
[Get] http://localhost:8000/api/bikes'
[Get] http://localhost:8000/api/bikes/{id}
[Post] http://localhost:8000/api/bikes
[Put] http://localhost:8000/api/bikes/{id}
[Delete] http://localhost:8000/api/bikes/{id}
```
#### 5. CRUD Mobil
```
[Get] http://localhost:8000/api/cars'
[Get] http://localhost:8000/api/cars/{id}
[Post] http://localhost:8000/api/cars
[Put] http://localhost:8000/api/cars/{id}
[Delete] http://localhost:8000/api/cars/{id}
```

### Others
- Unit Test using PHPUnit Test

``` bash
PHPUNIT
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
