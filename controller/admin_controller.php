<?php

/* Config */
require_once "config.php";

$msg = $message->getAlert();

/* Controller Register User */
try {
    if (isset($_POST['register_user'])) {
      $app->persist();
        $message->setAlert('User added successfully', 'alert-success', 'index.php');
    }
} catch (Exception $error) {
    $message->setAlert($error->getMessage(), 'alert-danger', 'index.php');
}

/* List of Users */
$userList = $result->allUsers();




