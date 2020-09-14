<?php

/* Config */
require_once "config.php";

/* Controller Register User */

try {
    if (isset($_POST['register_user'])) {
      $app->persist();
    }
} catch (Exception $error) {
    echo $error->getMessage();
}

/* List of Users */
$userList = $result->allUsers();




