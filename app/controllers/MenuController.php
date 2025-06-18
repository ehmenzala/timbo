<?php

class MenuController
{

  public function __construct(
    private PdoProductRepository $pdoProductRepository,
    private PdoPaymentMethodRepository $pdoPaymentMethodRepository,
    private PdoOrderSummaryRepository $pdoOrderSummaryRepository,
  ) {}

  public function index(): void
  {

    $productType = $_GET['product_type'] ?? 0;
    $products = $productType === 0
      ? $this->pdoProductRepository->findAllProductSummary()
      : $this->pdoProductRepository->findProductSummaryByProductTypeId($productType);

    require 'app/views/index.php';
  }

  public function search(): void
  {
    $searchTerm = $_GET['term'] ?? '';
    $products = $this->pdoProductRepository->findProductSummaryBySearchTerm($searchTerm);

    require 'app/views/search.php';
  }

  public function purchase(): void
  {
    $allPaymentMethods = $this->pdoPaymentMethodRepository->findAllPaymentTypes();
    $cartProducts = array_map(function ($p) {
      return [
        'product' => $this->pdoProductRepository->findProductSummaryById($p->getId()),
        'amount' => $p->getQuantity(),
      ];
    }, UserSession::getValue('user-products'));
    require 'app/views/purchase.php';
  }

  public function redirectPurchase(): void
  {
    // Save cart products on active session
    UserSession::setValue('user-products', array_map(function ($p) {
      return new ProductOnCart(
        $p['id'],
        $p['amount']
      );
    }, $_POST['products']));

    header("location: /timbo/compra/");
  }

  public function storeOrder(): void
  {
    echo '<pre>';
    var_dump($_POST);
    echo '<pre>';

    $this->pdoOrderSummaryRepository->add(
      new OrderSummary(
        new DateTime(),
        UserSession::getValue('user-id'),
        $_POST['payment-method'],
        UserSession::getValue('user-products')
      )
    );

    header("location: /timbo/");
  }
}
