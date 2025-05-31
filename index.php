<?php

session_start();

$BASE_PATH = __DIR__;

require $BASE_PATH . '/Router.php';

require $BASE_PATH . '/app/controllers/IndexController.php';
require $BASE_PATH . '/app/controllers/LoginController.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];

$router = new Router();

$indexController = new IndexController();
$loginController = new LoginController();

//1. Index
$router->get('/timbo/', [$indexController, 'index']);

// 2. Login
$router->get('/timbo/login/', [$loginController, 'index']);
$router->get('/timbo/register/', [$loginController, 'register']);
$router->post('/timbo/login/user/', [$loginController, 'logUserIn']);
$router->post('/timbo/register/user/', [$loginController, 'storeUser']);

$router->route($uri, $method);
