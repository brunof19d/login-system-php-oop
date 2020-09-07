<?php require_once "includes/header.php"; ?>

<div class="container mt-2 text-center">
    <h5>Admin Page - <strong>Register User</strong></h5>
    <a href="home-admin.-template.php" class="btn btn-primary m-3">Home</a>
</div>

<div class="container mt-2">

    <form class="m-5" method="POST" action="">

        <?php include 'view/alert.php'; ?>

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

        <button name="register_user" type="submit" class="btn btn-success mt-2">Create User</button>

    </form>
    
</div>

<?php require_once "includes/footer.php"; ?>