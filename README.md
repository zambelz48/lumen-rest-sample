## About
Sample REST API using laravel lumen micro-framework.

## Setup
1. Rename `.env.sample` into `.env`, and configure the proper configuration value, especially for the database configuration.
2. Create a database with the same name as declared name in `.env` file before.
3. Run command `php artisan migrate` to create database tables.
4. Run command `php -S <HOST>:<PORT> -t public` (host and post should match with the given value in `.env` file).
