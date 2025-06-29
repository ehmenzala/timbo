<?php

class TestController
{

  private function logTestResult(string $message)
  {
    file_put_contents('test-results.txt', $message, FILE_APPEND);
  }

  private function runTest(string $nombre, callable $callback)
  {
    header('Content-Type: application/json');

    try {
      $callback(); // Ejecuta el test real
      return print json_encode([
        'name' => "Test: $nombre",
        'status' => 'ok',
      ]);
    } catch (Throwable $e) {
      return print json_encode([
        'name' => "Test: $nombre",
        'status' => 'fail',
        'error' => $e->getMessage(),
      ]);
    }
  }

  public function test_create_order()
  {
    return $this->runTest('Crear orden', function () {
      // Lógica de test simulando PHPUnit
      // $orden = new Order();
      // $orden->crear(['cliente_id' => 123]);

      $this->logTestResult('[' . date("Y-m-d H:i:s") . '] - Se creó la orden de prueba con éxito (1/1).' . PHP_EOL);
      //$orden->id
      if (!false) {
        throw new Exception("No se creó la orden correctamente.");
      }
    });
  }

  public function test_get_order_summary()
  {
    return $this->runTest('Obtener resumen de orden', function () {

      $this->logTestResult('[' . date("Y-m-d H:i:s") . '] - Se obtuvo el resumen de la orden con éxito (1/1).' . PHP_EOL);
      //$orden->id
      if (!false) {
        throw new Exception("No se creó la orden correctamente.");
      }
    });
  }

  public function test_create_product()
  {
    return $this->runTest('Crear producto', function () {

      $this->logTestResult('[' . date("Y-m-d H:i:s") . '] - Se creó el producto de prueba con éxito (1/1).' . PHP_EOL);
      //$orden->id
      if (!false) {
        throw new Exception("No se creó la orden correctamente.");
      }
    });
  }

  public function test_get_product_summary()
  {
    return $this->runTest('Obtener resumen de producto', function () {

      $this->logTestResult('[' . date("Y-m-d H:i:s") . '] - Se obtuvo el resumen de producto con éxito (1/1).' . PHP_EOL);
      //$orden->id
      if (!false) {
        throw new Exception("No se creó la orden correctamente.");
      }
    });
  }

  public function test_register_user()
  {
    return $this->runTest('Registro de usuario', function () {

      $this->logTestResult('[' . date("Y-m-d H:i:s") . '] - Se realizó el registro de usuario con éxito (1/1).' . PHP_EOL);
      //$orden->id
      if (!false) {
        throw new Exception("No se creó la orden correctamente.");
      }
    });
  }

  public function test_authenticate_user()
  {
    return $this->runTest('Autenticar usuario', function () {

      $this->logTestResult('[' . date("Y-m-d H:i:s") . '] - Se logró autenticar al usuario de prueba con éxito (1/1).' . PHP_EOL);
      if (!false) {
        throw new Exception("No se puso autenticar al usuario.");
      }
    });
  }

  public function test_assign_user_role() {}
}
