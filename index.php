<?php

session_start();

$BASE_PATH = __DIR__;

require $BASE_PATH . '/Router.php';

require $BASE_PATH . '/app/controllers/IndexController.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];

$router = new Router();

$indexController = new IndexController();

$router->get('/timbo/', [$indexController, 'index']);

$router->route($uri, $method);
