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


    public function registerValidation(string $email, string $password)
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

    public function deleteValitadion($id)
    {
        $this->validId($id);
        $this->user->setId($id);
        $this->pdoRepository->remove($this->user);
    }

    public function switchStatusUser($id, $active)
    {
        $this->validId($id);

        $this->user->setId($id);
        $this->user->setActive($active);

        $this->pdoRepository->update($this->user);
    }

    public function validEmail($email): void
    {
        $result = filter_var($email, FILTER_VALIDATE_EMAIL);
        if ($result === false) {
            throw new Exception('Please, insert email valid');
        }
    }

    public function validPassword($password): void
    {
        $result = trim(filter_var($password, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
        if (!$result) {
            throw new Exception('Please, insert password valid');
        } elseif (strlen($result) < 3) {
            throw new Exception('Password must to be longer three characters');
        }
    }

    public function validId($id): void
    {
        $result = filter_var($id, FILTER_VALIDATE_INT);
        if ($result === false or $result <= 0) {
            throw new Exception('ID is invalid');
        }
    }


}