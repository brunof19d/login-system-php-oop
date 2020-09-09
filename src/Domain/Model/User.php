<?php


namespace Login\App\Domain\Model;


class User
{
    private int $id;
    private string $email;
    private string $password;
    private int $active;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function getActive(): int
    {
        return $this->active;
    }
}
