<?php
require 'core/bootstrap.php';

$routes = [
	'/edit' => 'EditController@index',
];

$db = [
	'name'     => 'tasklist',
	'username' => 'root',
	'password' => '',
];

$router = new Router($routes);
$router->run($_GET['url'] ?? '');