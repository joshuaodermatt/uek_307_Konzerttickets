<?php
require 'core/bootstrap.php';

$routes = [
	'edit' => 'EditController@edit',
    'update' => 'Editcontroller@update'
];



$router = new Router($routes);
$router->run($_GET['url'] ?? '');