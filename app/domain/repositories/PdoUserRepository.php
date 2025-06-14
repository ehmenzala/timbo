<?php

class PdoUserRepository
{

  public function __construct(
    private PDO $db,
    private PdoUserRoleRepository $pdoUserRoleRepository
  ) {}

  public function findUserByEmail(string $email): ?LoggedInUser
  {
    $st = $this->db->prepare("
      SELECT id, name, password, email FROM user
      WHERE email=:email;
    ");

    $st->execute([':email' => $email]);
    $result = $st->fetch();
    $st->closeCursor();

    if (!$result) {
      return null;
    }

    $roles = $this->pdoUserRoleRepository->findAllRolesByUserId($result['id']);

    return new LoggedInUser(
      $result['id'],
      $result['name'],
      $result['email'],
      $result['password'],
      $roles,
    );
  }

  public function add(RegisteredUser $user): ?RegisteredUser
  {
    $st = $this->db->prepare("
      INSERT INTO user (name, surname, email, password, dni, phone, address)
      VALUES (:name, :surname, :email, :password, :documentNumber, '', '')
    ");

    $success = $st->execute([
      ':name' => $user->getName(),
      ':surname' => $user->getSurname(),
      ':email' => $user->getEmail(),
      ':password' => $user->getPassword(),
      ':documentNumber' => $user->getDocumentNumber(),
    ]);

    if ($success) {
      $id = $this->db->lastInsertId();
      $user->setId($id);

      // Asignar roles a los usuarios
      $this->pdoUserRoleRepository->addRolesToUser($user);
      return $user;
    }

    return null;
  }
}
