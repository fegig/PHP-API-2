<?php

declare(strict_types=1);

require 'utility/errorHandler.php';
require 'utility/routing.php';

require 'controller/user.php';
require 'controller/levels.php';
require 'controller/balance.php';
require 'controller/finance.php';
require 'controller/rates.php';

// Instantiate controllers
$userController = new UserController();
$levelsController = new LevelsController();
$balanceController = new BalanceController();
$financeController = new FinanceController();
$ratesController = new RatesController();

// Request method and path
$method = $_SERVER['REQUEST_METHOD'];
$path = trim($_SERVER['PATH_INFO'] ?? '', '/');
$data = json_decode(file_get_contents('php://input'), true);

// Flag to track if a route was matched
$routeMatched = false;

// Sample routing for UserController
if (isGet()) {
    $routeMatched = route('users/?', [$userController, 'getUser']);
} elseif (isPost()) {
    $routeMatched = route('users', [$userController, 'createUser']);
} elseif (isPut()) {
    $routeMatched = route('users/?', [$userController, 'updateUser']);
} elseif (isDelete()) {
    $routeMatched = route('users/?', [$userController, 'deleteUser']);
}

// Sample routing for LevelsController
if (!$routeMatched) {
    if (isGet()) {
        $routeMatched = route('levels/?', [$levelsController, 'getLevel']);
    } elseif (isPost()) {
        $routeMatched = route('levels', [$levelsController, 'createLevel']);
    } elseif (isPut()) {
        $routeMatched = route('levels/?', [$levelsController, 'updateLevel']);
    } elseif (isDelete()) {
        $routeMatched = route('levels/?', [$levelsController, 'deleteLevel']);
    }
}

// If no route was matched, return a 404 error
if (!$routeMatched) {
    err_type(404);
}
