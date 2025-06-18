<?php

$BASE_PATH = __DIR__;

require $BASE_PATH . '/app/domain/ProductOnCart.php';

session_start();

require $BASE_PATH . '/Router.php';

require $BASE_PATH . '/app/helpers/UserSession.php';

require $BASE_PATH . '/app/controllers/MenuController.php';
require $BASE_PATH . '/app/controllers/LoginController.php';
require $BASE_PATH . '/app/controllers/admin/AdminController.php';

require $BASE_PATH . '/app/domain/ProductSummary.php';
require $BASE_PATH . '/app/domain/OrderSummary.php';
require $BASE_PATH . '/app/domain/PaymentMethod.php';
require $BASE_PATH . '/app/domain/auth/LoggedInUser.php';
require $BASE_PATH . '/app/domain/auth/RegisteredUser.php';
require $BASE_PATH . '/app/domain/auth/UserRole.php';
require $BASE_PATH . '/app/domain/repositories/PdoProductRepository.php';
require $BASE_PATH . '/app/domain/repositories/PdoUserRepository.php';
require $BASE_PATH . '/app/domain/repositories/PdoUserRoleRepository.php';
require $BASE_PATH . '/app/domain/repositories/PdoPaymentMethodRepository.php';
require $BASE_PATH . '/app/domain/repositories/PdoOrderSummaryRepository.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];

$router = new Router();

$db = new PDO('mysql:host=localhost:3307;dbname=timbo', 'root');
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);

$pdoProductRepository = new PdoProductRepository($db);
$pdoUserRoleRepository = new PdoUserRoleRepository($db);
$pdoUserRepository = new PdoUserRepository(
  $db,
  $pdoUserRoleRepository
);

$pdoPaymentMethodRepository = new PdoPaymentMethodRepository($db);
$pdoOrderSummaryRepository = new PdoOrderSummaryRepository(
  $db,
  $pdoProductRepository,
);

/* Controllers */
$menuController = new MenuController(
  $pdoProductRepository,
  $pdoPaymentMethodRepository,
  $pdoOrderSummaryRepository,
);
$loginController = new LoginController(
  $pdoUserRepository,
  $pdoUserRoleRepository
);
$adminController = new AdminController(
  $pdoProductRepository,
  $pdoOrderSummaryRepository,
  $pdoUserRepository,
  $pdoUserRoleRepository,
);

// 1. Menu
$router->get('/timbo/', [$menuController, 'index']);
$router->get('/timbo/busqueda/', [$menuController, 'search']);
$router->get('/timbo/compra/', [$menuController, 'purchase']);
$router->get('/timbo/compra/gracias/', [$menuController, 'thankYou']);
$router->get('/timbo/perfil/mis-ordenes/', [$menuController, 'myOrders']);
$router->post('/timbo/process/purchase/', [$menuController, 'redirectPurchase']);
$router->post('/timbo/make/order/', [$menuController, 'storeOrder']);

// 2. Menu

// 3. Profile

/*
/account/user/ (Se muestran nombres, apellidos, cel, correo, etc.)
/account/location/ (Direcciones creadas por el cliente)
/account/orders/ (Pedidos del cl, id pedido, precio total, estado, fecha y hora)
*/

// 4. Admin
$router->get('/timbo/admin/', [$adminController, 'index']);

// 4. Login
$router->get('/timbo/login/', [$loginController, 'index']);
$router->get('/timbo/register/', [$loginController, 'register']);
$router->get('/timbo/logout/user/', [$loginController, 'logUserOut']);
$router->post('/timbo/login/user/', [$loginController, 'logUserIn']);
$router->post('/timbo/register/user/', [$loginController, 'storeUser']);

$router->route($uri, $method);
