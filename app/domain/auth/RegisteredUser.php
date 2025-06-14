<?php

class RegisteredUser
{

  public function __construct(
    private ?int $id,
    private string $name,
    private string $surname,
    private string $email,
    private string $password,
    private string $documentNumber,
    /** @var UserRole[] */
    private array $roles,
  ) {}

  public function getId(): ?string
  {
    return $this->id;
  }

  public function setId(int $id): void
  {
    $this->id = $id;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function getSurname(): string
  {
    return $this->surname;
  }

  public function getEmail(): string
  {
    return $this->email;
  }

  public function getPassword(): string
  {
    return $this->password;
  }

  public function getDocumentNumber(): string
  {
    return $this->documentNumber;
  }

  /** @return UserRole[] */
  public function getRoles(): array
  {
    return $this->roles;
  }
}
