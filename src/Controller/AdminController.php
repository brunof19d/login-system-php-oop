<?php


namespace Login\App\Controller;


use Exception;
use Login\App\Domain\Model\User;
use Login\App\Infrastructure\Repository\PdoUserRepository;

class AdminController
{
    public function registerValidation(string $email, string $password)
    {
        $this->validEmail($email);
        $this->validPassword($password);

        $user = new User();
        $result = new PdoUserRepository();

        $user->setEmail($email);
        $user->setPassword($password);

        $result->save($user);

    }

    public function validEmail($email): void
    {
        $result = filter_var($email, FILTER_VALIDATE_EMAIL);

        if ($result === false) {
            throw new Exception('Email invalid');
        }
    }

    public function validPassword($password): void
    {
        $result = trim(filter_var($password, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

        if (!$result) {
            throw new Exception('Password invalid');
        } elseif (strlen($result) < 3) {
            throw new Exception('Password must to be longer three characters');
        }
    }
}