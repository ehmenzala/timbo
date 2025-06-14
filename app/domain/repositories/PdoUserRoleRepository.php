<?php

class PdoUserRoleRepository
{

  public function __construct(
    private PDO $db
  ) {}

  /** @return UserRole[] */
  public function findAllRolesByUserId(int $userId): array
  {
    $st = $this->db->prepare("
      SELECT r.name AS role_name, r.id AS role_id
        FROM user u
          INNER JOIN user_roles ur
            ON ur.user_id =  u.id
          INNER JOIN role r
            ON ur.role_id = r.id
      WHERE u.id = :userId;
    ");

    $st->execute([':userId' => $userId]);
    $results = $st->fetchAll(PDO::FETCH_ASSOC);

    if (!$results) {
      return [];
    }

    $roles = array_map(function ($result) {
      return new UserRole(
        $result['role_id'],
        $result['role_name'],
      );
    }, $results);
    return $roles;
  }

  public function addRolesToUser(RegisteredUser $user): void
  {

    $st = $this->db->prepare("
      INSERT INTO user_roles (user_id, role_id)
      VALUES (:user_id, :role_id)
    ");

    foreach ($user->getRoles() as $role) {
      $st->execute([
        ':user_id' => $user->getId(),
        ':role_id' => $role->getId(),
      ]);
    }
  }
}
