<?php

class PaymentMethod
{

  public function __construct(
    private int $id,
    private string $name,
    private string $owner,
    private string $description,
  ) {}

  public function getId(): string
  {
    return $this->id;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function getOwner(): string
  {
    return $this->owner;
  }

  public function getDescription(): string
  {
    return $this->description;
  }
}
