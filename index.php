<?php

session_start();

$BASE_PATH = __DIR__;

require $BASE_PATH . '/Router.php';

require $BASE_PATH . '/app/controllers/IndexController.php';

require $BASE_PATH . '/app/services/UserService.php';

// Database connection
$serverName = "DATABASENAME";
$connectionInfo = array("Database"=>"database_name", "UID"=>"user", "PWD"=>"password", "CharacterSet"=>"utf-8");
$conn = sqlsrv_connect($serverName, $connectionInfo);

// Current user session information
$user_id = $_SESSION['mysession']['user_id'];
$perfil = $_SESSION['mysession']['perfil'];
$permiso = $_SESSION['mysession']['permiso'];
$acceso = $_SESSION['mysession']['acceso'];

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];

$router = new Router();

$userService = new UserService($conn, $user_id);

$indexController = new IndexController($userService);

$router->get('/portal/apps/mvc-base/', [$indexController, 'index']);

$router->route($uri, $method);
