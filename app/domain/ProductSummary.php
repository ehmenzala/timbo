<?php

class ProductSummary
{

  public function __construct(
    private int $id,
    private string $name,
    private float $price,
    private string $image,
    private string $detail,
    private string $productTypeName,
  ) {}

  public function getId(): int
  {
    return $this->id;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function getPrice(): float
  {
    return $this->price;
  }

  public function getImage(): string
  {
    return $this->image;
  }
  public function getDetail(): string
  {
    return $this->detail;
  }

  public function getProductType(): string
  {
    return $this->productTypeName;
  }
}
