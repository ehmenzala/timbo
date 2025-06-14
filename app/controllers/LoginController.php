<?php

class LoginController
{

  public function __construct(
    private PdoUserRepository $pdoUserRepository,
    private PdoUserRoleRepository $pdoUserRoleRepository,
  ) {}

  public function index(): void
  {
    require 'app/views/login.php';
  }

  public function register(): void
  {
    require 'app/views/register.php';
  }

  public function logUserIn(): void
  {
    $email = $_POST['email'];
    $passwd = $_POST['password'];

    $loggedUser = $this->pdoUserRepository->findUserByEmail($email);
    $passwordIsCorrect = password_verify($passwd, $loggedUser->getPassword());
    $roles = $this->pdoUserRoleRepository->findAllRolesByUserId($loggedUser->getId());

    if ($passwordIsCorrect) {
      UserSession::setValue('user-id', $loggedUser->getId());
      UserSession::setValue('user-name', $loggedUser->getName());
      UserSession::setValue('user-email', $loggedUser->getEmail());
      UserSession::setValue('user-roles', array_map(fn($r) => $r->getName(), $roles));
    } else {
      session_destroy();
    }

    header("location: /timbo/");
  }

  public function logUserOut(): void
  {
    session_destroy();
    header("location: /timbo/");
  }

  public function storeUser(): void
  {
    $passwd = $_POST['password'];
    $passwdHash = password_hash($passwd, PASSWORD_BCRYPT);
    $roles = [new UserRole(1, 'customer')];

    $user = new RegisteredUser(
      null,
      $_POST['name'],
      $_POST['surname'],
      $_POST['email'],
      $passwdHash,
      $_POST['doc-number'],
      $roles,
    );

    $registeredUser = $this->pdoUserRepository->add($user);

    UserSession::setValue('user-id', $registeredUser->getId());
    UserSession::setValue('user-name', $registeredUser->getName());
    UserSession::setValue('user-email', $registeredUser->getEmail());
    UserSession::setValue('user-roles', array_map(fn($r) => $r->getName(), $roles));

    header("location: /timbo/login/");
  }
}
