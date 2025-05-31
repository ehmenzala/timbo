<?php

class LoginController {

  public function __construct() {
  }

  public function index(): void {
    require 'app/views/login.html';
  }

  public function register(): void {
    require 'app/views/register.html';
  }

  public function logUserIn(): void {
    header("location: /timbo/");
  }

  public function storeUser(): void {
    header("location: /timbo/login/");
  }
}
