<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Timbo | Registro</title>
  <link rel="stylesheet" href="/timbo/public/css/style.css">
</head>

<body>
  <?php include("app/partials/header.php") ?>
  <main>
    <div class="container">
      <div class="auth-container">
        <h1 class="auth-container__title">Registrarse</h1>
        <form action="/timbo/register/user/" method="POST" class="auth-container__form">
          <div class="auth-container__field">
            <label for="email">Correo electrónico</label>
            <input type="text" name="email" id="email" placeholder="user@email.com" required>
          </div>
          <div class="auth-container__field">
            <label for="name">Nombres</label>
            <input type="text" name="name" id="name" required>
          </div>
          <div class="auth-container__field">
            <label for="surname">Apellidos</label>
            <input type="text" name="surname" id="surname" required>
          </div>
          <div class="auth-container__field">
            <label for="doc-number">DNI</label>
            <input type="text" name="doc-number" id="doc-number" required>
          </div>
          <div class="auth-container__field">
            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" placeholder="********" required>
          </div>
          <button class="auth-container__btn" type="submit">Registrarse</button>
        </form>
        <p>¿Ya tienes una cuenta? <a href="/timbo/login/">Inicia Sesión</a>.</p>
      </div>
    </div>
  </main>
  <?php include('app/partials/footer.php') ?>
</body>

</html>