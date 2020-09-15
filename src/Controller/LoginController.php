<?php


namespace Login\App\Controller;


use Exception;
use Login\App\Domain\Model\User;
use Login\App\Infrastructure\Repository\PdoUserRepository;

class LoginController extends AdminController
{
    public function loginValidation(string $email, string $password)
    {
        $this->validEmail($email);
        $this->validPassword($password);

        $user = new User();
        $result = new PdoUserRepository();

        $user->setEmail($email);
        $user->setPassword($password);

        $queryLogin = $result->login($user);
        $queryActive = $result->active($user);

        $this->validUser($queryLogin, $queryActive);
    }

    public function validUser($queryLogin, $queryActive)
    {
        if ($queryLogin == FALSE) {
            throw new Exception('Email or password wrong');
        } elseif ($queryActive == FALSE) {
            throw new Exception('User is not active, please contact Web Administrator');
        } else {
            header("Location:" . SITE_URL . "admin/index.php");
        }
    }

}