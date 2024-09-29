<?php
require 'utility/errorHandler.php';
require 'utility/routing.php';

require 'controller/user.php';
require 'controller/levels.php';
require 'controller/balance.php';
require 'controller/finance.php';
require 'controller/rates.php';

require 'utility/security/index.php';

$router = new Router();
// SecurityCheck::validateRequest();

$router->get('users/{id}', 'UserController@getUser');
$router->post('users', 'UserController@createUser');
$router->put('users', 'UserController@updateUser');
$router->delete('users', 'UserController@deleteUser');

$router->get('levels', 'LevelsController@getLevel');
$router->post('levels', 'LevelsController@createLevel');
$router->put('levels', 'LevelsController@updateLevel');
$router->delete('levels', 'LevelsController@deleteLevel');

$router->handleRequest();
