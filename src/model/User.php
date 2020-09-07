<?php

class User
{
    private string $email;
    private string $password;

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
