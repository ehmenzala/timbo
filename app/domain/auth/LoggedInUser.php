<?php

class LoggedInUser
{

  public function __construct(
    private int $id,
    private string $name,
    private string $email,
    private string $password,
    /** @var string[] */
    private array $roles,
  ) {}

  public function getId(): string
  {
    return $this->id;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function getEmail(): string
  {
    return $this->email;
  }

  public function getPassword(): string
  {
    return $this->password;
  }

  /** @return string[] */
  public function getRoles(): array
  {
    return $this->roles;
  }
}
