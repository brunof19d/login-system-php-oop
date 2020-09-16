<?php
/* Config */
require_once "config.php";

$msg = $message->getAlert();
try {
    if (isset($_POST['login_user'])) {

        $email = $_POST['input_email'];
        $password = $_POST['input_password'];

        $login->loginValidation($email, $password);

    }
} catch (Exception $error) {
    $message->setAlert($error->getMessage(), 'alert-danger', 'index.php');
}

