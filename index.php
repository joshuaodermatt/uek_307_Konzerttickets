<?php
require 'core/bootstrap.php';

$routes = [

	'/dashboard' => '',
	'/' => '',
	'/create' => 'CreateController@create',
	'/edit' => '',
	'/pending' => 'PendingController@show',
	'/detail' => '',
	'/add' => 'CreateController@add',
	'/update' => '',
];



$router = new Router($routes);
$router->run($_GET['url'] ?? '');