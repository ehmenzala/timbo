<?php

class ProductOnCart
{

  public function __construct(
    private int $id,
    private string $quantity,
  ) {}

  public function getId(): int
  {
    return $this->id;
  }

  public function getQuantity(): string
  {
    return $this->quantity;
  }
}
