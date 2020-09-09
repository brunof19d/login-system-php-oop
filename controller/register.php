<?php

$user = new \Login\App\Domain\Model\User();
$result = new \Login\App\Infrastructure\Repository\PdoUserRepository();

if (isset($_POST['register_user'])) {
    $email = $_POST['input_email'];
    $password = $_POST['input_password'];

    $user->setEmail($email);
    $user->setPassword($password);
    $result->save($user);
}

$userList = $result->allUsers();


