<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace Login\App\Entity;

class User
{
    private int $id;
    private string $email;
    private string $password;

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }


}