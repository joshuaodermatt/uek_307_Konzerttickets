<?php
require 'core/bootstrap.php';

$routes = [
    '/' => 'DashboardController@show',
    '/dashboard' => 'DashboardController@show',
	'/edit' => 'EditController@edit',
    '/update' => 'EditController@update',
	'/create' => 'CreateController@create',
	'/add' => 'CreateController@add',
    '/pending' => 'PendingController@list',
    '/detail' => 'DetailController@show'
];



$router = new Router($routes);
$router->run($_GET['url'] ?? '');