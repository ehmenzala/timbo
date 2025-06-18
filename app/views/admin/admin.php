<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Timbo | Administrador</title>
  <link rel="stylesheet" href="/timbo/public/css/style.css">
</head>

<body>
  <?php include("app/partials/header.php") ?>
  <main style="position: relative;">
    <div class="container">
      <h1>Administración</h1>

      <h2>Órdenes Realizadas</h2>
      <ul class="admin-orders" role="list">
        <?php foreach ($orders as $order):  ?>
          <li>
            <h3>X Orden Realizada</h3>
            <p><?= $order->getDate()->format('d \d\e F \a \l\a\s h:i A') ?></p>
            <h4>Productos</h4>
            <ul>
              <?php foreach ($order->getOrderProducts() as $product):  ?>
                <?php $productSummary = $this->pdoProductRepository->findProductSummaryById($product->getId()) ?>
                <li><?= $productSummary->getName() ?> (x<?= $product->getQuantity() ?>)</li>
              <?php endforeach; ?>
            </ul>
            <p><b>Total:</b> S/139.90</p>
            <?php $orderMaker = $this->pdoUserRepository->findUserById($order->getUserId())  ?>
            <p>Orden realizada por: <?= $orderMaker->getName() ?>.</p>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </main>
  <?php include('app/partials/footer.php') ?>
</body>

</html>