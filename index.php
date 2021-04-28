<?php
require 'core/bootstrap.php';

$routes = [
	'edit' => 'EditController@edit',
];



$router = new Router($routes);
$router->run($_GET['url'] ?? '');