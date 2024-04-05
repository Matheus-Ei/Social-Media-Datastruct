<?php

namespace src\Classes;

class User
{
    private string $name;
    private int $age;
    private string $email;
    private string $password;
    private array $connections = [];


    public function __construct(int $age, string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->age = $age;
        $this->email = $email;
        $this->password = $password;
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

    public function setConnections(array $connections): void
    {
        $this->connections = $connections;
    }

    public function getConnections(): array
    {
        return $this->connections;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getEmailToAtSign(): string
    {
        $email = explode('@', $this->email);
        return strtolower($email[0]);
    }

    public function getPassword(): string
    {
        return $this->password;
    }

}
