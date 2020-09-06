<?php

require_once "config.php";
require_once "includes/header.php";

try {

    if (isset($_POST['register_user'])) {

        $email_user = filter_var($_POST['email_user'], FILTER_VALIDATE_EMAIL);
        $password_user = filter_var($_POST['password_user'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $password_confirm = filter_var($_POST['confirm_password_user'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

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

    }

} catch (\Throwable $th) {
    echo 'Caught exception: ', $th->getMessage();
}


?>

<div class="container mt-5 border rounded">
    <form class="m-5" method="POST">

        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="text" name="email_user" class="form-control" placeholder="Enter email">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password_user" class="form-control" placeholder="Password">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" name="confirm_password_user" class="form-control" placeholder="Confirm Password">

        </div>

        <button name="register_user" type="submit" class="btn btn-primary mt-2">Submit</button>

    </form>
</div>

<?php require_once "includes/footer.php"; ?>