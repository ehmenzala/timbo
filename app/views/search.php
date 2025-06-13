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
    <div class="cart-overlay closed"></div>
    <article class="cart closed" id="cart">
      <header class="cart-header">
        <h2>Orden</h2>
        <button class="cart-header__close-btn cart-product__control">
          <img src="/timbo/public/img/close-icon.svg" alt="Close icon">
        </button>
      </header>
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
        <span class="cart-total-content__price" id="cart-total-price">S/00.00</span>
      </div>
      <div class="cart-confirm">
        <a href="#" class="cart-confirm__btn btn btn-warning">Confirmar</a>
      </div>
    </article>
    <div class="container">
      <h1>Resultados para la Búsqueda '<?= $searchTerm ?>'</h1>
      <ul class="menu-tabs" role="list">
        <li class="menu-tab">
          <img src="/timbo/public/img/pizza-icon.svg" alt="Ícono" aria-hidden="true" class="menu-tab__icon">
          <a href="/timbo/?product_type=1" class="menu-tab__link">Entradas</a>
        </li>
        <li class="menu-tab">
          <img src="/timbo/public/img/pizza-icon.svg" alt="Ícono" aria-hidden="true" class="menu-tab__icon">
          <a href="/timbo/?product_type=2" class="menu-tab__link">Sopa</a>
        </li>
        <li class="menu-tab">
          <img src="/timbo/public/img/pizza-icon.svg" alt="Ícono" aria-hidden="true" class="menu-tab__icon">
          <a href="/timbo/?product_type=3" class="menu-tab__link">Pollos al Fogón / Salón</a>
        </li>
        <li class="menu-tab">
          <img src="/timbo/public/img/pizza-icon.svg" alt="Ícono" aria-hidden="true" class="menu-tab__icon">
          <a href="/timbo/?product_type=4" class="menu-tab__link">Menú Especial</a>
        </li>
        <li class="menu-tab">
          <img src="/timbo/public/img/pizza-icon.svg" alt="Ícono" aria-hidden="true" class="menu-tab__icon">
          <a href="/timbo/?product_type=5" class="menu-tab__link">Ensalada</a>
        </li>
        <li class="menu-tab">
          <img src="/timbo/public/img/pizza-icon.svg" alt="Ícono" aria-hidden="true" class="menu-tab__icon">
          <a href="/timbo/?product_type=6" class="menu-tab__link">Parrilla Convencional</a>
        </li>
        <li class="menu-tab">
          <img src="/timbo/public/img/pizza-icon.svg" alt="Ícono" aria-hidden="true" class="menu-tab__icon">
          <a href="/timbo/?product_type=7" class="menu-tab__link">Parrillas</a>
        </li>
        <li class="menu-tab">
          <img src="/timbo/public/img/pizza-icon.svg" alt="Ícono" aria-hidden="true" class="menu-tab__icon">
          <a href="/timbo/?product_type=8" class="menu-tab__link">Guarniciones</a>
        </li>
        <li class="menu-tab">
          <img src="/timbo/public/img/pizza-icon.svg" alt="Ícono" aria-hidden="true" class="menu-tab__icon">
          <a href="/timbo/?product_type=9" class="menu-tab__link">Postres</a>
        </li>
        <li class="menu-tab">
          <img src="/timbo/public/img/pizza-icon.svg" alt="Ícono" aria-hidden="true" class="menu-tab__icon">
          <a href="/timbo/?product_type=10" class="menu-tab__link">Cocina Criolla</a>
        </li>
        <li class="menu-tab">
          <img src="/timbo/public/img/pizza-icon.svg" alt="Ícono" aria-hidden="true" class="menu-tab__icon">
          <a href="/timbo/?product_type=11" class="menu-tab__link">Bebidas</a>
        </li>
        <li class="menu-tab">
          <img src="/timbo/public/img/pizza-icon.svg" alt="Ícono" aria-hidden="true" class="menu-tab__icon">
          <a href="/timbo/?product_type=12" class="menu-tab__link">Cafetería</a>
        </li>
      </ul>
      <h2>Escoger Platillo</h2>
      <section class="products">
        <?php foreach ($products as $product): ?>
          <article
            class="product"
            data-product-title="<?= $product->getName() ?>"
            data-product-price="<?= $product->getPrice() ?>"
            data-product-id="<?= $product->getId() ?>"
            data-product-description="<?= $product->getDetail() ?>">
            <img src="/timbo/public/img/<?= $product->getImage() ?>" alt="Imagen de Producto" class="product__img">
            <div class="product__detail">
              <h3 class="product__title"><?= $product->getName() ?></h3>
              <p class="product__description"><?= $product->getDetail() ?></p>
              <p class="product__price">S/<?= $product->getId() ?></p>
            </div>
            <button href="#" class="product__btn btn btn-primary">
              Agregar
            </button>
          </article>
        <?php endforeach; ?>
      </section>
    </div>
  </main>
  <?php include('app/partials/footer.php') ?>
  <script src="/timbo/public/js/main.js"></script>
</body>

</html>