<?php

Route::post('/', 'mapsController@index')->name("googlemaps");
Route::get('/auth', 'AuthController@getToken')->name("token");


