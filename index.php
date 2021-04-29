<?php
require 'core/bootstrap.php';

$routes = [
	'/edit' => 'EditController@edit',
    '/update' => 'Editcontroller@update',
	'/create' => 'CreateController@create',
	'/add' => 'CreateController@add',
    '/pending' => 'PendingController@list',
    '/detail' => 'DetailController@show'
];



$router = new Router($routes);
$router->run($_GET['url'] ?? '');