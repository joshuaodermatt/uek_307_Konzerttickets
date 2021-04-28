<?php
require 'core/bootstrap.php';

$routes = [
	'edit' => 'EditController@edit',
  'update' => 'Editcontroller@update'
	'/dashboard' => '',
	'/' => '',
	'/create' => 'CreateController@create',
	'/pending' => '',
	'/detail' => '',
	'/add' => 'CreateController@add',
];



$router = new Router($routes);
$router->run($_GET['url'] ?? '');