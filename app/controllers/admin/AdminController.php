<?php

class AdminController
{

  public function __construct(
    private PdoProductRepository $pdoProductRepository,
    private PdoOrderSummaryRepository $pdoOrderSummaryRepository,
    private PdoUserRepository $pdoUserRepository,
    private PdoUserRoleRepository $pdoUserRoleRepository,
  ) {}


  public function index(): void
  {
    $email = UserSession::getValue('user-email');
    $loggedUser = $this->pdoUserRepository->findUserByEmail($email);
    $roles = $this->pdoUserRoleRepository->findAllRolesByUserId($loggedUser->getId());
    $roleNames = array_map(fn($role) => $role->getName(), $roles);

    if (!in_array('admin', $roleNames)) {
      header('location: /timbo/');
      die();
    }

    $orders = $this->pdoOrderSummaryRepository->findAll();

    require 'app/views/admin/admin.php';
  }
}
