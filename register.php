<?php
require 'vendor/autoload.php';
require_once "controller/register.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Title</title>
</head>
<body>
<div class="container my-5">
    <form method="POST" action="" class="card mx-auto w-50">
        <div class="card-header p-5 text-center">
            <h3 class="h2 mb-0">Admin Page - Register User </h3>
        </div>
        <div class="card-body p-5">
            <div class="form-group">
                <label for="inputEmail">Email:</label>
                <input type="email" name="input_email" id="inputEmail" placeholder="user@email.com"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label for="inputPassword">Password:</label>
                <input type="password" name="input_password" id="inputPassword" placeholder="*****"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <button name="register_user" class="btn btn-dark btn-block">
                    Register
                </button>
            </div>
        </div>
        <table class="table table-striped text-center">
            <thead>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Password</th>
                <th>Active</th>
                <th>#</th>
            </tr>
            </thead>
            <tbody style="font-size: 14px;">
            <?php foreach ($userList as $user): ?>
                <tr>
                    <th><?php echo $user->getId(); ?></th>
                    <td><?php echo $user->getEmail(); ?></td>
                    <td><?php echo $user->getPassword(); ?></td>
                    <td><?php echo $user->getActive(); ?></td>
                    <td><a class="btn btn-danger">Delete</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="card-header p-5 text-center">
            <h5>Bruno Dadario - All rights reserved.</h5>
        </div>
    </form>
</div>
</body>
</html>
