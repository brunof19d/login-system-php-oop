<?php


namespace Login\App\Controller;


use Exception;
use Login\App\Domain\Model\User;
use Login\App\Infrastructure\Repository\PdoUserRepository;

class AdminController
{
    public function persist()
    {
        $user = new User();
        $result = new PdoUserRepository();

        $email = filter_var($_POST['input_email'], FILTER_VALIDATE_EMAIL);
        $password = filter_var($_POST['input_password'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

        if ($email === false) {
            throw new Exception('Email invalid');
        }

        $user->setEmail($email);
        $user->setPassword($password);
        $result->save($user);

    }
}