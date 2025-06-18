<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Timbo | Mis Órdenes</title>
  <link rel="stylesheet" href="/timbo/public/css/style.css">
</head>

<body>
  <?php include("app/partials/header.php") ?>
  <main style="position: relative;">
    <div class="container">
      <h1>Mis Órdenes</h1>

      <h2>¡Haz realizado <?= $orderCount ?> órdenes con nosotros!</h2>
      <p>Visualiza el resumen de cada una de tus órdenes en la lista inferior.</p>
      <ul class="admin-orders" role="list">
        <?php foreach ($orders as $order):  ?>
          <li>
            <h3>⦾ Orden Realizada</h3>
            <p><?= $order->getDate()->format('d \d\e F \a \l\a\s h:i A') ?></p>
            <h4>Productos</h4>
            <ul>
              <?php $total = 0; ?>
              <?php foreach ($order->getOrderProducts() as $product):  ?>
                <?php $productSummary = $this->pdoProductRepository->findProductSummaryById($product->getId()) ?>
                <?php $total += $product->getQuantity() * $productSummary->getPrice(); ?>
                <li><?= $productSummary->getName() ?> (x<?= $product->getQuantity() ?>)</li>
              <?php endforeach; ?>
            </ul>
            <p><b>Total:</b> S/<?= number_format($total, 2) ?></p>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </main>
  <?php include('app/partials/footer.php') ?>
</body>

</html>