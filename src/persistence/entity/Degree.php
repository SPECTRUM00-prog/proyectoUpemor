<?php
class Degree
{
    private int $id;
    private string $name;
    private string $description;

    public function __construct()
    {
        $this->id = 0;
        $this->name = "";
        $this->description = "";
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
}
