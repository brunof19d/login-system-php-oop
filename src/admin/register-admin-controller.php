<?php

require_once "config.php";
$view_message = get_message();

try {
    if (isset($_POST['register_user'])) {

        // Filter STRING
        $email_user = test_input(filter_var($_POST['email_user'], FILTER_VALIDATE_EMAIL));
        $password_user = test_input(filter_var($_POST['password_user'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));
        $password_confirm = test_input(filter_var($_POST['confirm_password_user'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

        // Check if $email_user already registered in database
        if ($user_repository->isRegisteredUser($email_user)) {
            throw new Exception("Email already registered in database");
        }

        // Check that No POST in input email
        if ($email_user === FALSE) {
            throw new Exception("Please enter a valid email address");
        }

        // Check that if the 2 password fields are filled
        if (!$password_user or !$password_confirm) {
            throw new Exception("Password fields must be filled");
        }

        // Check that the 2 password fields are the same
        if ($password_user != $password_confirm) {
            throw new Exception("Password fields must be the same");
        }
        
        $user->setEmail($email_user);
        $user->setPassword($password_user);
        $user_repository->registerUser($user);

        set_message('User registered with success', 'alert-success');
    }
} catch (\Throwable $th) {
    set_message($th->getMessage(), 'alert-danger');
}

require_once "register-admin-template.php";
