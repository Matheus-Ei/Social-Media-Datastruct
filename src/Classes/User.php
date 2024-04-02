<?php

namespace src\Classes;

class User
{
    private int $id;
    private string $name;
    private int $age;
    private array $connections = [];


    public function __construct(int $age, string $name, int $id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setConnections(array $connections): void
    {
        $this->connections = $connections;
    }

    public function getConnections(): array
    {
        return $this->connections;
    }

}
