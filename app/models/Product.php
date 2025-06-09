<?php

class Product {

  public function __construct(
    private int $id,
    private string $name,
    private string $detail,
    private float $price,
    private string $image,
    private ProductType $productType,
  ) {}

  public function getId(): int {
    return $this->id;
  }

  public function getName(): string {
    return $this->name;
  }

  public function getDetail(): string {
    return $this->detail;
  }

  public function getPrice(): float {
    return $this->price;
  }

  public function getImage(): string {
    return $this->image;
  }

  public function getProductType(): ProductType {
    return $this->productType;
  }

}
