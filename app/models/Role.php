<?php

class Role {

  public function __construct(
    private int $id,
    private string $name,
  ) {}

  public function getId(): int {
    return $this->id;
  }
  
  public function getSurname(): string {
    return $this->surname;
  }

}
