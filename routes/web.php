<?php


$router->post('/', 'mapsController@index');
$router->get('/auth', 'AuthController@getToken');


