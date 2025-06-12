<?php

class OrderItem
{

  public function __construct(
    private Product $product,
    private int $quantity,
    private float $subtotal,
    private float $discount,
    private float $total,
  ) {}

  public function getProduct(): Product
  {
    return $this->product;
  }

  public function getQuantity(): int
  {
    return $this->quantity;
  }

  public function getSubtotal(): float
  {
    return $this->subtotal;
  }

  public function getDiscount(): float
  {
    return $this->discount;
  }

  public function getTotal(): float
  {
    return $this->total;
  }
}
