<?php

class TestController
{
  public function saludo()
  {
    return "Hola mundo";
  }

  public function test_create_order()
  {
    return $this->runTest('Crear orden', function () {
      // Lógica de test simulando PHPUnit
      // $orden = new Order();
      // $orden->crear(['cliente_id' => 123]);

      //$orden->id
      if (!false) {
        throw new Exception("No se creó la orden correctamente.");
      }
    });
  }

  public function test_get_order_summary() {}

  // Utilidad común para ejecutar y responder
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
}
