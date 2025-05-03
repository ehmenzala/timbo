<?php

class IndexController {

  public function __construct($userService) {
    $this->userService = $userService;
  }

  public function index() {
    $userData = $this->userService->getUserMenuData();
    
    $nombres = $userData['nombres'];
    $registro = $userData['registro'];
    $avatar = $userData['avatar'];
    $apps = $userData['apps']; // This is not user data but...

    require 'app/views/index.php';
  }
}
