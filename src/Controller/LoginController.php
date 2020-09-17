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

    /**
     * Receive the necessary data to validate the User in the system.
     * @param string $email $_POST['input_email'].
     * @param string $password $_POST['input_password'].
     * @return void
     * @throws Exception
     */
    public function loginValidation(string $email, string $password): void
    {
        $this->adminController->validEmail($email);
        $this->adminController->validPassword($password);

        $this->user->setEmail($email);
        $this->user->setPassword($password);

        $queryLogin = $this->pdoRepository->login($this->user);
        $queryActive = $this->pdoRepository->active($this->user);

        $this->validUser($queryLogin, $queryActive);
    }

    /**
     * Verify the user input (EMAIL, PASSWORD)correct and also if the user is active.
     * @param bool $queryLogin
     * @param bool $queryActive
     * @return void
     * @throws Exception
     */
    public function validUser(bool $queryLogin, bool $queryActive): void
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

    /**
     * Blocks unauthenticated users from accessing administrative pages
     * @return void
     */
    public function blockAdmin(): void
    {
        $is_admin = ($this->helper->verifyUrlAdmin());
        if ($is_admin == true and $this->IsUserLogged() == false) {
            header('Location: ' . SITE_URL . "index.php");
            die();
        }
    }

    /**
     * Returns if the user is logged or not.
     * @return bool
     */
    public function IsUserLogged(): bool
    {
        return (isset($_SESSION['logged_user']));
    }

    /**
     * Destroy session from the user.
     * @return void
     */
    public function logout(): void
    {
        unset($_SESSION['logged_user']);
    }


}