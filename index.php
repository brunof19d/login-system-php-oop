<?php
require_once "config.php";
require_once "lib/includes/header.php";
?>

<!-- Info page  -->
<div class="card-header p-5 text-center">
    <h3 class="h2 mb-0">Login system</h3>
    <p class="mt-1">Simple login using PHP Oriented Object.</p>
</div>
<!-- Form Login -->
<div class="card-body p-5">
    <!-- Input Email -->
    <div class="form-group">
        <label for="inputEmail">Email:</label>
        <input type="email" name="input_email" id="inputEmail" placeholder="user@email.com" class="form-control"/>
    </div>
    <!-- Input Password -->
    <div class="form-group">
        <label for="inputPassword">Password:</label>
        <input type="password" name="input_pasword" id="inputPassword" placeholder="*****" class="form-control"/>
    </div>
    <!-- Button -->
    <div class="form-group">
        <button name="login_user" class="btn btn-dark btn-block">Login</button>
    </div>
</div>

<?php require_once "lib/includes/footer.php"; ?>