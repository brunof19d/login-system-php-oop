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

/* Remove User Controller */
try {
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $controller->deleteValidation($id);

        $message->setAlert('User remove successfully', 'alert-success', 'index.php');
    }
} catch (Exception $error) {
    $message->setAlert($error->getMessage(), 'alert-danger', 'index.php');
}

/* Active User Controller */
try {
    if (isset($_GET['active'])) {
        $id = $_GET['active'];
        $active = 1;
        $controller->switchStatusUser($id, $active);

        $message->setAlert('User active with successfully', 'alert-success', 'index.php');
    }
} catch (Exception $error) {
    $message->setAlert($error->getMessage(), 'alert-danger', 'index.php');
}

/* inactive User Controller */
try {
    if (isset($_GET['inactive'])) {
        $id = $_GET['inactive'];
        $active = 0;
        $controller->switchStatusUser($id, $active);

        $message->setAlert('User successfully deactivated', 'alert-success', 'index.php');
    }
} catch (Exception $error) {
    $message->setAlert($error->getMessage(), 'alert-danger', 'index.php');
}

/* List Users Controller */
$userList = $result->allUsers();



