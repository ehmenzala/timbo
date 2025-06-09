<?php

class User {

  public function __construct(
    private int $id,
    private string $name,
    private string $surname,
    private string $email,
    private string $passsword,
    private string $dni,
    private string $phone,
    private string $addres,
    /** @var Role[] */
    private array $roles,
  ) {}

  public function getId(): int {
    return $this->id;
  }

  public function getName(): string {
    return $this->name;
  }
  
  public function getSurname(): string {
    return $this->surname;
  }

  public function getEmail(): string {
    return $this->email;
  }

  public function getPasssword(): string {
    return $this->passsword;
  }

  public function getDNI(): string {
    return $this->dni;
  }

  public function getPhone(): string {
    return $this->phone;
  }

  public function getAddress(): string {
    return $this->address;
  }

  /** @return Role[] */
  public function getRoles(): array {
    return $this->roles;
  }

}
