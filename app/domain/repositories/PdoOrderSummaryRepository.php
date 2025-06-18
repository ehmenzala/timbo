<?php

class PdoOrderSummaryRepository
{

  public function __construct(
    private PDO $db,
    private PdoProductRepository $pdoProductRepository,
  ) {}

  public function add(OrderSummary $order): void
  {
    $this->db->beginTransaction();

    try {
      /* Creating order */
      $st = $this->db->prepare("
        INSERT INTO `order` (user_id, payment_method_id)
        VALUES (:userId, :paymentMethodId)
      ");

      $success = $st->execute([
        ':userId' => $order->getUserId(),
        ':paymentMethodId' => $order->getPaymentMethodId(),
      ]);


      $createdOrderId = $success ? $this->db->lastInsertId() : null;
      if (!$createdOrderId) {
        throw new Exception('No se pudo crear la orden.');
      }

      /* Creating order items */

      $stProduct = $this->db->prepare("
        INSERT INTO order_products (order_id, product_id, quantity, subtotal, discounts, total)
        VALUES (:orderId, :product_id, :quantity, :subtotal, :discounts, :total);
      ");

      foreach ($order->getOrderProducts() as $orderProduct) {
        $productSummary = $this->pdoProductRepository->findProductSummaryById($orderProduct->getId());
        $total = $productSummary->getPrice() * $orderProduct->getQuantity();

        $stProduct->execute([
          ':orderId' => $createdOrderId,
          ':product_id' => $productSummary->getId(),
          ':quantity' => $orderProduct->getQuantity(),
          ':subtotal' => $total,
          ':discounts' => 0, // Always 0
          ':total' => $total,
        ]);
      }

      $this->db->commit();
    } catch (Exception $e) {
      $this->db->rollBack();
      echo '[PdoOrderSummaryRepository]: Error al crear la orden.';
      throw $e;
    }
  }
}
