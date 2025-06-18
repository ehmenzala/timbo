<?php

class PdoProductRepository
{

  public function __construct(
    private PDO $db
  ) {}

  /** @return ProductSummary[] */
  public function findAllProductSummary(): array
  {
    $st = $this->db->prepare("
      SELECT p.id, p.name, p.price, p.image,
        p.detail, pt.name AS product_type
      FROM product p
        INNER JOIN product_type pt
          ON pt.id = p.product_type_id
    ");

    $st->execute();
    $results = $st->fetchAll(PDO::FETCH_ASSOC);

    if (!$results) {
      return [];
    }

    $products = array_map(function ($result) {
      return new ProductSummary(
        $result['id'],
        $result['name'],
        $result['price'],
        $result['image'],
        $result['detail'],
        $result['product_type'],
      );
    }, $results);
    return $products;
  }

  /** @return ProductSummary[] */
  public function findProductSummaryByProductTypeId(int $productTypeId): array
  {
    $st = $this->db->prepare("
      SELECT p.id, p.name, p.price, p.image,
        p.detail, pt.name AS product_type
      FROM product p
        INNER JOIN product_type pt
          ON pt.id = p.product_type_id
      WHERE pt.id = :productTypeId
    ");
    $st->execute([':productTypeId' => $productTypeId]);
    $results = $st->fetchAll(PDO::FETCH_ASSOC);

    if (!$results) {
      return [];
    }

    $products = array_map(function ($result) {
      return new ProductSummary(
        $result['id'],
        $result['name'],
        $result['price'],
        $result['image'],
        $result['detail'],
        $result['product_type'],
      );
    }, $results);
    return $products;
  }

  public function findProductSummaryById(int $productId): ?ProductSummary
  {
    $st = $this->db->prepare("
      SELECT p.id, p.name, p.price, p.image,
        p.detail, pt.name AS product_type
      FROM product p
        INNER JOIN product_type pt
          ON pt.id = p.product_type_id
      WHERE p.id = :productId
    ");
    $st->execute([':productId' => $productId]);
    $result = $st->fetch();

    if (!$result) {
      return null;
    }

    return new ProductSummary(
      $result['id'],
      $result['name'],
      $result['price'],
      $result['image'],
      $result['detail'],
      $result['product_type'],
    );
  }

  /** @return ProductSummary[] */
  public function findProductSummaryBySearchTerm(string $searchTerm): array
  {
    $st = $this->db->prepare("
      SELECT p.id, p.name, p.price, p.image,
        p.detail, pt.name AS product_type
      FROM product p
        INNER JOIN product_type pt
          ON pt.id = p.product_type_id
      WHERE p.name LIKE :searchTerm
    ");
    $st->execute([':searchTerm' => '%' . $searchTerm . '%']);
    $results = $st->fetchAll(PDO::FETCH_ASSOC);

    if (!$results) {
      return [];
    }

    $products = array_map(function ($result) {
      return new ProductSummary(
        $result['id'],
        $result['name'],
        $result['price'],
        $result['image'],
        $result['detail'],
        $result['product_type'],
      );
    }, $results);
    return $products;
  }
}
