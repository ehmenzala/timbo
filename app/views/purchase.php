<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Timbo</title>
  <link rel="stylesheet" href="/timbo/public/css/style.css">
</head>

<body>
  <?php include("app/partials/header.php") ?>
  <main>
    <div class="container">
      <h1>Finalizar Compra</h1>
      <h2>Información de Compra</h2>
      <form action="/timbo/make/order/" method="POST" class="purchase-form">

        <div class="input-group">
          <p class="h4">Tipo de Comprobante</p>
          <div class="div">
            <label for="boleta">Boleta</label>
            <input type="radio" name="tipo-comprobante" id="boleta" value="boleta" required>
            <label for="factura">Factura</label>
            <input type="radio" name="tipo-comprobante" id="factura" value="factura" required>
          </div>
        </div>

        <div class="input-group">
          <label for="doc-type" class="h4">Tipo de Documento</label>
          <select id="doc-type" name="doc-type" required>
            <option value="1">DNI</option>
            <option value="2">CE</option>
          </select>
        </div>

        <div class="input-group">
          <label for="doc-number" class="h4">Número de Documento</label>
          <input type="number" min="0" id="doc-number" name="doc-number" required>
        </div>

        <div class="input-group">
          <label for="tel" class="h4">Celular</label>
          <input type="tel" id="tel" name="tel" required>
        </div>

        <div class="input-group">
          <label for="payment-method" class="h4">Forma de Pago</label>
          <select id="payment-method" name="payment-method" required>
            <?php foreach ($allPaymentMethods as $paymentMethod): ?>
              <option value="<?= $paymentMethod->getId() ?>"><?= $paymentMethod->getName() ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="input-group">
          <label for="location" class="h4">Ubicación</label>
          <input type="text" id="location" name="location" required>
        </div>

        <h2>Resumen de tu Compra</h2>
        <ul>
          <?php $totalPrice = 0 ?>
          <?php foreach ($cartProducts as $cartProduct): ?>
            <?php
            $linePrice = $cartProduct['amount'] * $cartProduct['product']->getPrice();
            $totalPrice += $linePrice;
            ?>
            <li><?= $cartProduct['amount']; ?>x <?= $cartProduct['product']->getName() ?> (S/<?= number_format($linePrice, 2); ?>)</li>
            <input
              type="hidden"
              name="products[<?= $cartProduct['product']->getId() ?>][id]"
              value="<?= $cartProduct['product']->getId() ?>" />
            <input
              type="hidden"
              name="products[<?= $cartProduct['product']->getId() ?>][amount]"
              value="<?= $cartProduct['amount']; ?>" />
          <?php endforeach; ?>
        </ul>
        <p class="h4">Subtotal</p>
        <p>S/<?= number_format($totalPrice, 2) ?></p>
        <button class="btn btn-primary">Hacer pedido</button>
      </form>
    </div>
  </main>
  <?php include('app/partials/footer.php') ?>
</body>

</html>