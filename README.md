# Lumen API

#### local dev
get source
    $ git clone https://github.com/abeatrice/lumen-api.git
    $ cd lumen-api

install dependencies
    $ composer install

copy env file
    $ cp .env.example .env

create database in mysql
    $ mysql -u root -p
    $ create database lumen;
    $ exit

migrate tables
    $ php artisan migrate

serve the application
    $ php -S localhost:8000 -t public