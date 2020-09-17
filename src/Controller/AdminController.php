<?php


namespace Login\App\Controller;


use Exception;
use Login\App\Domain\Model\User;
use Login\App\Helper\Helper;
use Login\App\Infrastructure\Repository\PdoUserRepository;

class AdminController
{

    private User $user;
    private PdoUserRepository $pdoRepository;
    private Helper $helper;

    public function __construct()
    {
        $this->user = new User();
        $this->pdoRepository = new PdoUserRepository();
        $this->helper = new Helper();
    }

    /**
     * Register the user in the system.
     * @param string $email $_POST['input_email'].
     * @param string $password $_POST['input_password'].
     * @return void
     * @throws Exception
     */
    public function registerValidation(string $email, string $password): void
    {
        $this->validEmail($email);
        $this->validPassword($password);
        $this->user->setEmail($email);

        if ($this->pdoRepository->isUserAlreadyRegistered($this->user)) {
            throw new Exception('User already exists');
        }
        // Make hash password
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $this->user->setPassword($hash);
        $this->pdoRepository->save($this->user);
    }

    /**
     * Remove the user from the system.
     * @param int $id User ID.
     * @return void
     * @throws Exception
     */
    public function deleteValidation(int $id): void
    {
        $this->validId($id);
        $this->user->setId($id);
        $this->pdoRepository->remove($this->user);
    }

    /**
     * Changes the user's status to active or inactive.
     * @param int $id User ID.
     * @param int $active Number 1 = Active, Number 0 Inactive.
     * @return void
     * @throws Exception
     */
    public function switchStatusUser(int $id, int $active): void
    {
        $this->validId($id);
        $this->user->setId($id);
        $this->user->setActive($active);
        $this->pdoRepository->update($this->user);
    }

    /**
     * Filter received email by the $_POST.
     * @param string $email string that the user wants to filter.
     * @return void
     * @throws Exception
     */
    public function validEmail(string $email): void
    {
        $result = filter_var($email, FILTER_VALIDATE_EMAIL);
        if ($result === false) {
            throw new Exception('Please, insert email valid');
        }
    }

    /**
     * Filter received password by the $_POST.
     * @param string $password string that the user wants to filter.
     * @return void
     * @throws Exception
     */
    public function validPassword(string $password): void
    {
        $result = trim(filter_var($password, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
        if (!$result) {
            throw new Exception('Please, insert password valid');
        } elseif (strlen($result) < 3) {
            throw new Exception('Password must to be longer three characters');
        }
    }

    /**
     * Filter received number by the $_GET.
     * @param int $id User ID.
     * @return void
     * @throws Exception
     */
    public function validId(int $id): void
    {
        $result = filter_var($id, FILTER_VALIDATE_INT);
        if ($result === false or $result <= 0) {
            throw new Exception('ID is invalid');
        }
    }


}