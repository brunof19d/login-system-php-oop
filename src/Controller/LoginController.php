<?php


namespace Login\App\Controller;


use Exception;
use Login\App\Domain\Model\User;
use Login\App\Helper\Helper;
use Login\App\Infrastructure\Repository\PdoUserRepository;

class LoginController
{
    private AdminController $adminController;
    private Helper $helper;
    private User $user;
    private PdoUserRepository $pdoRepository;

    public function __construct()
    {
        $this->adminController = new AdminController();
        $this->user = new User();
        $this->pdoRepository = new PdoUserRepository();
        $this->helper = new Helper();
    }
    
    public function loginValidation(string $email, string $password)
    {
        $this->adminController->validEmail($email);
        $this->adminController->validPassword($password);

        $this->user->setEmail($email);
        $this->user->setPassword($password);

        $queryLogin = $this->pdoRepository->login($this->user);
        $queryActive = $this->pdoRepository->active($this->user);

        $this->validUser($queryLogin, $queryActive);
    }

    public function validUser($queryLogin, $queryActive)
    {
        if ($queryLogin == FALSE) {
            throw new Exception('Email or password wrong');
        } elseif ($queryActive == FALSE) {
            throw new Exception('User is not active, please contact Web Administrator');
        } else {
            $_SESSION['logged_user'] = $queryLogin;
            header("Location:" . SITE_URL . "admin/index.php");
            die();
        }
    }

    public function blockAdmin(): void
    {
        $is_admin = ($this->helper->verifyUrlAdmin());
        if ($is_admin == true and $this->IsUserLogged() == false) {
            header('Location: ' . SITE_URL . "index.php");
            die();
        }
    }

    public function IsUserLogged(): bool
    {
        return (isset($_SESSION['logged_user']));
    }

    public function logout(): void
    {
        unset($_SESSION['logged_user']);
    }


}