<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Timbo | Login</title>
  <link rel="stylesheet" href="/timbo/public/css/style.css">
</head>

<body>
  <?php include("app/partials/header.php") ?>
  <main>
    <div class="container">
      <div class="auth-container">
        <h1 class="auth-container__title">Iniciar sesión</h1>
        <form action="/timbo/login/user/" method="POST" class="auth-container__form">
          <div class="auth-container__field">
            <label for="email">Usuario</label>
            <input type="email" name="email" id="email" placeholder="user@email.com" required>
          </div>
          <div class="auth-container__field">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" placeholder="Contraseña" required>
          </div>
          <button class="auth-container__btn" type="submit">Iniciar Sesión</button>
        </form>
        <p>¿No tienes una cuenta? <a href="/timbo/register/">Regístrate</a>.</p>
      </div>
    </div>
  </main>
  <?php include('app/partials/footer.php') ?>
</body>

</html>