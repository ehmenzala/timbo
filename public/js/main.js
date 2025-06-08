const $cart = document.getElementById('cart')
const $cartProductsList = document.getElementById('cart-products-list')
const $productsElements = document.querySelectorAll('.product')

function extractProductData($productElement) {
  const $p = $productElement
  return {
    id: $p.dataset.productId,
    title: $p.dataset.productTitle,
    description: $p.dataset.productDescription,
    price: $p.dataset.productPrice,
  }
}

/* Cart controls */
$closeCartBtn = $cart.querySelector('.cart-header__close-btn');
$openCartBtn = document.querySelector('.header__cart-btn')
$cartOverlay = document.querySelector('.cart-overlay')

$openCartBtn.addEventListener('click', () => {
  $cart.classList.remove('closed')
  $cartOverlay.classList.remove('closed')
})

$closeCartBtn.addEventListener('click', () => {
  $cart.classList.add('closed')
  $cartOverlay.classList.add('closed')
})

/* Dynamically add product to cart */
let productIndex = 0
$productsElements.forEach($p => {
  $p.addEventListener('click', (e) => {
    const product = extractProductData($p)
    $addProductBtn = $p.querySelector('.product__btn')

    if (e.target === $addProductBtn) {
      /* Create cart product list element */
      const $cartProduct = document.createElement('LI')
      $cartProduct.classList.add('cart-product') // <li class="cart-product">...</li>
      $cartProduct.dataset.productPrice = product.price
      $cartProduct.innerHTML = `
        <div class="cart-product__detail">
          <header class="cart-product__header">
            <h3>${product.title}</h3>
            <button class="cart-product__remove-btn cart-product__control" aria-label="Remove product">
              <img src="/timbo/public/img/remove-icon.svg" alt="Remove icon">
            </button>
          </header>
          <div class="cart-product__body">
            <p class="cart-product__price">S/${product.price}</p>
            <p class="cart-product__description">${product.description}</p>
          </div>
          <div class="cart-product__amount">
            <input type="hidden" name="products[${productIndex}][id]" value="${product.id}">
            <button class="cart-product__minus-btn cart-product__control">
              <img src="/timbo/public/img/minus-icon.svg" alt="Remove icon">
            </button>
            <input
              type="number"
              name="products[${productIndex}][amount]"
              min="1"
              value="1"
              class="cart-product__amount-input"
            >
            <button class="cart-product__plus-btn cart-product__control">
              <img src="/timbo/public/img/plus-icon.svg" alt="Remove icon">
            </button>
          </div>
        </div>
        <div class="cart-product__image">
          <img src="/timbo/public/img/food-image-2.webp" alt="Ícono" aria-hidden="true" class="menu-tab__icon">
        </div>
      `;
      productIndex++

      /* Element destroy */
      const $removeBtn = $cartProduct.querySelector('.cart-product__remove-btn')
      $removeBtn.addEventListener('click', () => {
        $cartProduct.remove()
      })


      /* Input functionality */
      const $cartAmountInput = $cartProduct.querySelector('.cart-product__amount-input')
      const $addBnt = $cartProduct.querySelector('.cart-product__plus-btn')
      const $minusBnt = $cartProduct.querySelector('.cart-product__minus-btn')

      $addBnt.addEventListener('click', () => {
        $cartAmountInput.value = parseInt($cartAmountInput.value) + 1
        $cartAmountInput.dispatchEvent(new Event('input', { bubbles: true }))
      })

      $minusBnt.addEventListener('click', () => {
        const newVal = parseInt($cartAmountInput.value) - 1
        const isNotNegative = newVal > 0
        if (isNotNegative) {
          $cartAmountInput.value = newVal
          $cartAmountInput.dispatchEvent(new Event('input', { bubbles: true }))
        }
      })


      $cartProductsList.appendChild($cartProduct)
    }
  })
})

/* Re-calculate subtotal */
const $subtotal = document.getElementById('cart-total-price')

$cart.addEventListener('input', (e) => {
  if (e.target.matches('.cart-product__amount-input')) {
    const $cartProducts = $cart.querySelectorAll('.cart-product')
    let totalCost = 0

    $cartProducts.forEach($product => {
      const product = extractProductData($product)
      const amount = parseInt($product.querySelector('.cart-product__amount-input').value, 10) || 0
      const price = parseFloat(product.price) || 0
      totalCost += price * amount
    })

    $subtotal.textContent = `S/${totalCost.toFixed(2)}`
  }
})
