<?php


$router->post('/', 'mapsController@index');
$router->get('/auth', 'AuthController@getToken');
$router->get('/test',function()
{
	return response()->json([
		"statusCode" => 200,
		"message" => "successfully tested"
	],200);
});


