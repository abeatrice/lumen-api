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
    select lumen-api.postman_collection.json from project root

#### Run Tests
    $ ./vendor/bin/phpunit


#### API

| Verb      | Endpoint                      | Description                           |
|:--------- |:----------------------------- |:------------------------------------- |
| POST      | /api/user/register            | register a new user                   |
| POST      | /api/user/login               | login a user & get a Bearer Token     |
| POST      | /api/user/flights             | assign flight to user                 |
| GET       | /api/user/{user_id}/flights   | get user's flights                    |
| GET       | /api/flights                  | get all flights                       |
| GET       | /api/{flight_id}              | get one flight by id                  |