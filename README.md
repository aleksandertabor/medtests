Medtests
======================

## ๐ Requirements

- PHP version: >= 8 (with `sqlite3` extension)
- Composer

## ๐งพ How to run

1. `git clone https://github.com/aleksandertabor/medtests YOURPROJECTNAME`
2. `cd YOURPROJECTNAME`
3. Install dependencies:

    `composer install`

4. `cp .env.example .env`
5. `php artisan key:generate`
6. `touch database/database.sqlite`
7. `php artisan migrate --seed`
8. Run your server `php artisan serve`.

## ๐งช Testing

`vendor/bin/phpunit` or `php artisan test`


## ๐งฐ Built with

- Laravel 8


## ๐ To-do

- More tests ๐
- ...
