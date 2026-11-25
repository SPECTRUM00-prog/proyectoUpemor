<?php
class User
{
    private int $id;
    private string $name;
    private string $description;
    private string $email;
    private string $phone;
    private string $password;

    public function __construct()
    {
        $this->id = 0;
        $this->name = "";
        $this->email = "";
        $this->phone = "";
        $this->password = "";
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $value): void
    {
        $this->id = $value;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $value): void
    {
        $this->name = $value;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function setDescription(string $value): void
    {
        $this->description = $value;
    }
    //Generar la representacion en forma de cdena de texto de un objeto -- carrera
    public function toString(): string
    {
        return "[{$this->id}] {$this->name}";
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $value): void
    {
        $this->email = $value;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $value): void
    {
        $this->phone = $value;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $value): void
    {
        $this->password = $value;
    }
}
