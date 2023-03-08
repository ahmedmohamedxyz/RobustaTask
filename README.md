# RobustaTask

## Prerequests
- Docker(if you run it from docker)

or if you run it directly on the device you will need:
- php8.1 or above
- mysql
- the required php extensions needed for laravel

## APIs:
### you will find the APIs with exaples in the postman.json file in the project files.

## Up & Running:
### With Docker:
> composer install

> ./vendor/bin/sail up -d

> ./vendor/bin/sail artisan migrate

> ./vendor/bin/sail artisan db:seed

### Without Docker:
> composer install

> php artisan serve

> php artisan migrate

> php artisan db:seed