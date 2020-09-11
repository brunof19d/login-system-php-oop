<?php
/* Require autoload Composer */
require "vendor/autoload.php";
/* Config */
require_once "config.php";

use Login\App\Domain\Model\User;
use Login\App\Infrastructure\Repository\PdoUserRepository;

$user = new User();
$result = new PdoUserRepository();

/* Controller Register User */
try {
    if (isset($_POST['register_user'])) {

        $email = filter_var($_POST['input_email'], FILTER_VALIDATE_EMAIL);
        $password = filter_var($_POST['input_password'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

        if ($email === false) {
            throw new Exception('Email invalid');
        }

        $user->setEmail($email);
        $user->setPassword($password);
        $result->save($user);

    }
} catch (Exception $error) {
    echo $error->getMessage();
}

$userList = $result->allUsers();


