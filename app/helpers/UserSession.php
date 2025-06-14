<?php

class UserSession
{

  public function __construct() {}


  public static function getValue(string $key): ?string
  {
    return $_SESSION[$key] ?? null;
  }

  public static function setValue(string $key, $value): void
  {
    $_SESSION[$key] = $value;
  }
}
