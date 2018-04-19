<?php

$router->group(['prefix' => 'api'], function($router)
{
    $router->post('/', 'apiController@index');
	$router->get('/auth', 'AuthController@getToken');
	$router->get('/test',function()
	{
		return response()->json([
			"statusCode" => 200,
			"message" => "successfully tested"
		],200);
	});
});