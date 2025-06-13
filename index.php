<?php

session_start();

$BASE_PATH = __DIR__;

require $BASE_PATH . '/Router.php';

require $BASE_PATH . '/app/controllers/MenuController.php';
require $BASE_PATH . '/app/controllers/LoginController.php';

require $BASE_PATH . '/app/domain/ProductSummary.php';
require $BASE_PATH . '/app/domain/PdoProductRepository.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];

$router = new Router();

$db = new PDO('mysql:host=localhost:3307;dbname=timbo', 'root');
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);

$pdoProductRepository = new PdoProductRepository($db);

$menuController = new MenuController($pdoProductRepository);
$loginController = new LoginController();

// 1. Index
$router->get('/timbo/', [$menuController, 'index']);
$router->get('/timbo/busqueda/', [$menuController, 'search']);
$router->get('/timbo/compra/', [$menuController, 'purchase']);

// 2. Menu

// 3. Profile

/*
/account/user/ (Se muestran nombres, apellidos, cel, correo, etc.)
/account/location/ (Direcciones creadas por el cliente)
/account/orders/ (Pedidos del cl, id pedido, precio total, estado, fecha y hora)
*/

// 4. Login
$router->get('/timbo/login/', [$loginController, 'index']);
$router->get('/timbo/register/', [$loginController, 'register']);
$router->post('/timbo/login/user/', [$loginController, 'logUserIn']);
$router->post('/timbo/register/user/', [$loginController, 'storeUser']);

$router->route($uri, $method);
