<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Timbo | Gracias por tu Compra</title>
  <link rel="stylesheet" href="/timbo/public/css/style.css">
</head>

<body>
  <?php include("app/partials/header.php") ?>
  <main style="position: relative;">
    <div class="container">
      <h1>Gracias por tu compra, <?= UserSession::getValue('user-name') ?></h1>

      <p>Nuestro equipo ya se encuentra trabajando con tu pedido.</p>
      <p>Tu pedido llegará en aproximadamente 60 minutos.</p>
      <p>No te olvides seguirnos en nuestra redes sociales.</p>
      <p>¡Visítanos pronto! ¡Te esperamos!.</p>
      <a href="/timbo/perfil/mis-ordenes/" class="btn btn-primary">Ira Mis Órdenes</a>
    </div>
  </main>
  <?php include('app/partials/footer.php') ?>
</body>

</html>