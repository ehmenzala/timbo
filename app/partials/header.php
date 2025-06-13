<header class="header">
  <div class="header__content container">
    <img
      src="/timbo/public/img/timbo-logo.png"
      alt="Logo del restaurante. Gran Parrillada Timbó escrito con letras rojas cuadriculadas dentro de un espacio ovalado, con borde grueso de color turquesa."
      class="header-logo" />
    <div class="header__controls">
      <form action="/timbo/busqueda/" method="GET">
        <div class="header-search-wrapper">
          <input class="header-search" type="search" name="term" id="term" placeholder="Buscar en el menú">
        </div>
      </form>
      <a class="header-login-link" href="#">Iniciar Sesión o Registrarse</a>
      <button class="header__cart-btn">
        <img src="/timbo/public/img/cart-icon.svg" aria-hidden="true" alt="Ícono de carrito">
      </button>
    </div>
  </div>
</header>