<?php

class PdoPaymentMethodRepository
{

  public function __construct(
    private PDO $db
  ) {}

  /** @return array<PaymentMethod> */
  public function findAllPaymentTypes(): array
  {
    $st = $this->db->prepare("
      SELECT *
      FROM payment_method p
    ");

    $st->execute();
    $results = $st->fetchAll(PDO::FETCH_ASSOC);

    if (!$results) {
      return [];
    }

    $paymentMethods = array_map(function ($result) {
      return new PaymentMethod(
        $result['id'],
        $result['name'],
        $result['owner'],
        $result['description'],
      );
    }, $results);
    return $paymentMethods;
  }
}
