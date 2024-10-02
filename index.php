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

$router->get('users', 'UserController@getUser');
$router->post('users', 'UserController@createUser');
$router->put('users', 'UserController@updateUser');
$router->delete('users', 'UserController@deleteUser');

$router->get('levels', 'LevelsController@getLevel');
$router->post('levels', 'LevelsController@createLevel');
$router->put('levels', 'LevelsController@updateLevel');
$router->delete('levels', 'LevelsController@deleteLevel');

$router->get('balance/{id}', 'BalanceController@getBalance');
$router->post('balance', 'BalanceController@createBalance');
$router->put('balance', 'BalanceController@updateBalance');
$router->delete('balance', 'BalanceController@deleteBalance');

$router->get('finance', 'FinanceController@getFinanceData');
$router->post('finance', 'FinanceController@createFinanceEntry');
$router->put('finance', 'FinanceController@updateFinanceEntry');
$router->delete('finance', 'FinanceController@deleteFinanceEntry');

$router->get('rates', 'RatesController@getRates');
$router->post('rates', 'RatesController@createRate');
$router->put('rates', 'RatesController@updateRate');
$router->delete('rates', 'RatesController@deleteRate');

$router->handleRequest();
