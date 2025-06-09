<?php

class Order {

  public function __construct(
    private int $id,
    private DateTime $date,
    private User $user,
    private PaymentMethod $paymentMethod,
    /** @var OrderItem[] */
    private array $orderItems,
  ) {}

  public function getId(): int {
    return $this->id;
  }

  public function getDate(): DateTime {
    return $this->date;
  }

  public function getUser(): User {
    return $this->user;
  }

  public function getPaymentMethod(): PaymentMethod {
    return $this->paymentMethod;
  }

  /** @return OrderItem[] */
  public function getOrderItems(): array {
    return $this->orderItems;
  }

}
