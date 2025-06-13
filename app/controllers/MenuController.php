<?php

class MenuController
{

  public function __construct(
    private PdoProductRepository $pdoProductRepository
  ) {}

  public function index()
  {

    $productType = $_GET['product_type'] ?? 0;
    $products = $productType === 0
      ? $this->pdoProductRepository->findAllProductSummary()
      : $this->pdoProductRepository->findProductSummaryByProductTypeId($productType);

    require 'app/views/index.php';
  }

  public function search()
  {
    $searchTerm = $_GET['term'] ?? '';
    $products = $this->pdoProductRepository->findProductSummaryBySearchTerm($searchTerm);

    require 'app/views/search.php';
  }
}
