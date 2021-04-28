<?php
require 'core/bootstrap.php';

$routes = [
	'/edit' => 'EditController@index',
];



$router = new Router($routes);
$router->run($_GET['url'] ?? '');