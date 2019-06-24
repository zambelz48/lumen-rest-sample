## About
Sample REST API using laravel lumen micro-framework.

## Setup

#### Configuration

1. Rename `.env.sample` into `.env`, and configure the proper configuration value, especially for the database configuration.
2. Create a database with the same name as declared in `.env` file before.
3. Run command `php artisan migrate` to create database tables.

#### Run the application
Run command `php -S <HOST>:<PORT> -t public` (HOST and PORT should match with the given value in `.env` file)

## Unit test

#### Configuration
1. Open `phpunit.xml` file and set the database name at `DB_DATABASE` env key.
2. Create a database with the same name as the given value in `phpunit.xml`.

#### Run the test
Run the command `./vendor/bin/phpunit tests/ProductControllerTests`
