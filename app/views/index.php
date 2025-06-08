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
  <main style="position: relative;">
    <article class="cart collapsed" id="cart">
      <h2>Orden</h2>
      <ul class="cart-products" id="cart-products-list" role="list">
        <!-- <li class="cart-product">
          <div class="cart-product__detail">
            <header class="cart-product__header">
              <h3>Título del Producto</h3>
              <button class="cart-product__remove-btn cart-product__control" aria-label="Remove product">
                <img src="/timbo/public/img/remove-icon.svg" alt="Remove icon">
              </button>
            </header>
            <div class="cart-product__body">
              <p class="cart-product__price">S/49.90</p>
              <p class="cart-product__description">Descripción detallada del producto en cuestión.</p>
            </div>
            <div class="cart-product__amount">
              <button class="cart-product__minus-btn cart-product__control">
                <img src="/timbo/public/img/minus-icon.svg" alt="Remove icon">
              </button>
              <input
                type="number"
                min="0"
                value="1"
                class="cart-product__amount-input"
              >
              <button class="cart-product__add-btn cart-product__control">
                <img src="/timbo/public/img/plus-icon.svg" alt="Remove icon">
              </button>
            </div>
          </div>
          <div class="cart-product__image">
            <img src="/timbo/public/img/food-image-2.webp" alt="Ícono" aria-hidden="true" class="menu-tab__icon">
          </div>
        </li> -->
      </ul>
      <div class="cart-total-content">
        <span class="cart-total-content__title">Subtotal</span>
        <span class="cart-total-content__price" id="cart-total-price">S/149.70</span>
      </div>
      <div class="cart-confirm">
        <a href="#" class="cart-confirm__btn btn btn-warning">Confirmar</a>
      </div>
    </article>
    <div class="container">
      <h1>Carta</h1>
      <ul class="menu-tabs" role="list">
        <li class="menu-tab">
          <img src="/timbo/public/img/pizza-icon.svg" alt="Ícono" aria-hidden="true" class="menu-tab__icon">
          <a href="#" class="menu-tab__link">Entradas</a>
        </li>
        <li class="menu-tab">
          <img src="/timbo/public/img/pizza-icon.svg" alt="Ícono" aria-hidden="true" class="menu-tab__icon">
          <a href="#" class="menu-tab__link">Sopa</a>
        </li>
        <li class="menu-tab">
          <img src="/timbo/public/img/pizza-icon.svg" alt="Ícono" aria-hidden="true" class="menu-tab__icon">
          <a href="#" class="menu-tab__link">Ensalada</a>
        </li>
        <li class="menu-tab">
          <img src="/timbo/public/img/pizza-icon.svg" alt="Ícono" aria-hidden="true" class="menu-tab__icon">
          <a href="#" class="menu-tab__link">Pollos al Fogón / Salón</a>
        </li>
        <li class="menu-tab">
          <img src="/timbo/public/img/pizza-icon.svg" alt="Ícono" aria-hidden="true" class="menu-tab__icon">
          <a href="#" class="menu-tab__link">Menú Especial</a>
        </li>
        <li class="menu-tab">
          <img src="/timbo/public/img/pizza-icon.svg" alt="Ícono" aria-hidden="true" class="menu-tab__icon">
          <a href="#" class="menu-tab__link">Guarniciones</a>
        </li>
        <li class="menu-tab">
          <img src="/timbo/public/img/pizza-icon.svg" alt="Ícono" aria-hidden="true" class="menu-tab__icon">
          <a href="#" class="menu-tab__link">Postres</a>
        </li>
        <li class="menu-tab">
          <img src="/timbo/public/img/pizza-icon.svg" alt="Ícono" aria-hidden="true" class="menu-tab__icon">
          <a href="#" class="menu-tab__link">Criollo</a>
        </li>
        <li class="menu-tab">
          <img src="/timbo/public/img/pizza-icon.svg" alt="Ícono" aria-hidden="true" class="menu-tab__icon">
          <a href="#" class="menu-tab__link">Cafetería</a>
        </li>
      </ul>
      <h2>Escoger Platillo</h2>
      <section class="products">
        <article
          class="product"
          data-product-title="Product Title"
          data-product-price="25.00"
          data-product-id="2"
          data-product-description="Descripción detallada"
          >
          <img src="/timbo/public/img/food-image-2.webp" alt="Imagen de Producto" class="product__img">
          <div class="product__detail">
            <h3 class="product__title">Producto</h3>
            <p class="product__description">Producto</p>
            <p class="product__price">S/49.90</p>
          </div>
          <button href="#" class="product__btn btn btn-primary">
            Agregar
        </button>
        </article>
        <article class="product">
          <img src="/timbo/public/img/food-image-2.webp" alt="Imagen de Producto" class="product__img">
          <div class="product__detail">
            <h3 class="product__title">Producto</h3>
            <p class="product__description">Producto</p>
            <p class="product__price">S/49.90</p>
          </div>
          <button href="#" class="product__btn btn btn-primary">
            Agregar
        </button>
        </article>
        <article class="product">
          <img src="/timbo/public/img/food-image-2.webp" alt="Imagen de Producto" class="product__img">
          <div class="product__detail">
            <h3 class="product__title">Producto</h3>
            <p class="product__description">Producto</p>
            <p class="product__price">S/49.90</p>
          </div>
          <button href="#" class="product__btn btn btn-primary">
            Agregar
        </button>
        </article>
        <article class="product">
          <img src="/timbo/public/img/food-image-2.webp" alt="Imagen de Producto" class="product__img">
          <div class="product__detail">
            <h3 class="product__title">Producto</h3>
            <p class="product__description">Producto</p>
            <p class="product__price">S/49.90</p>
          </div>
          <button href="#" class="product__btn btn btn-primary">
            Agregar
        </button>
        </article>
        <article class="product">
          <img src="/timbo/public/img/food-image-2.webp" alt="Imagen de Producto" class="product__img">
          <div class="product__detail">
            <h3 class="product__title">Producto</h3>
            <p class="product__description">Producto</p>
            <p class="product__price">S/49.90</p>
          </div>
          <button href="#" class="product__btn btn btn-primary">
            Agregar
        </button>
        </article>
        <article class="product">
          <img src="/timbo/public/img/food-image-2.webp" alt="Imagen de Producto" class="product__img">
          <div class="product__detail">
            <h3 class="product__title">Producto</h3>
            <p class="product__description">Producto</p>
            <p class="product__price">S/49.90</p>
          </div>
          <button href="#" class="product__btn btn btn-primary">
            Agregar
        </button>
        </article>
        <article class="product">
          <img src="/timbo/public/img/food-image-2.webp" alt="Imagen de Producto" class="product__img">
          <div class="product__detail">
            <h3 class="product__title">Producto</h3>
            <p class="product__description">Producto</p>
            <p class="product__price">S/49.90</p>
          </div>
          <button href="#" class="product__btn btn btn-primary">
            Agregar
        </button>
        </article>
        <article class="product">
          <img src="/timbo/public/img/food-image-2.webp" alt="Imagen de Producto" class="product__img">
          <div class="product__detail">
            <h3 class="product__title">Producto</h3>
            <p class="product__description">Producto</p>
            <p class="product__price">S/49.90</p>
          </div>
          <button href="#" class="product__btn btn btn-primary">
            Agregar
        </button>
        </article>
        
      </section>
    </div>
  </main>
  <?php include('app/partials/footer.php') ?>
  <script src="/timbo/public/js/main.js"></script>
</body>
</html>
