<?php

class OrderSummary
{

  public function __construct(
    private DateTime $date,
    private int $userId,
    private int $paymentMethodId,
    /** @var ProductOnCart[] */
    private array $orderProducts,
  ) {}

  public function getDate(): DateTime
  {
    return $this->date;
  }

  public function getUserId(): int
  {
    return $this->userId;
  }

  public function getPaymentMethodId(): int
  {
    return $this->paymentMethodId;
  }

  /** @return array<ProductOnCart> */
  public function getOrderProducts(): array
  {
    return $this->orderProducts;
  }
}
