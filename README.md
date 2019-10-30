# Lumen API

#### Get Source
    $ git clone https://github.com/abeatrice/lumen-api.git
    $ cd lumen-api

#### Install Dependencies
    $ composer install

#### Copy env file
    $ cp .env.example .env

#### Create database in mysql
    $ mysql -u root -p
    $ create database lumen;
    $ exit

#### Migrate and seed tables
    $ php artisan migrate:fresh --seed

#### Serve the application
    $ php -S localhost:8000 -t public 

#### Postman collection
    open postman
    select import
    select lumen-api.postman_collection.json
    login user - generates bearer token
    get flights - returns all flights, bearer token required
    get flight - returns one flight, token required