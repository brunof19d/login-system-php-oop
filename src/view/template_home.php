<?php require_once "controller/home.php"; ?>

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

        <button type="submit" class="btn btn-primary mt-2">Submit</button>


    </form>
</div>