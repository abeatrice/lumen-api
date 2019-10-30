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

#### Migrate tables
    $ php artisan migrate

#### Serve the application
    $ php -S localhost:8000 -t public