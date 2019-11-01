<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//Flights group
$router->group(['prefix' => 'api/flights'], function() use ($router) {
    $router->get('/', 'FlightController@index');
    $router->get('/{flight}', 'FlightController@show');
});

//User group
$router->group(['prefix' => 'api/user'], function() use ($router) {
    $router->post('/register', 'RegisterUserController@store');
    $router->post('/login', 'LoginUserController@store');

    $router->get('/{userId}/flights', 'FlightUserController@index');
    $router->post('/{userId}/flights', 'FlightUserController@store');
});