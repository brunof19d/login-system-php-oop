<?php

/* Config */
require_once "config.php";

$msg = $message->getAlert();

/* Controller Register User */
try {
    if (isset($_POST['register_user'])) {

        $email = $_POST['input_email'];
        $password = $_POST['input_password'];

        $controller->registerValidation($email, $password);

        $message->setAlert('User added successfully', 'alert-success', 'index.php');
    }
} catch (Exception $error) {
    $message->setAlert($error->getMessage(), 'alert-danger', 'index.php');
}

/* List of Users */
$userList = $result->allUsers();




