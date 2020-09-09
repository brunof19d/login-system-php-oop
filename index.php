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
            <h3 class="h2 mb-0">Login system</h3>
            <p class="mt-1">Simple login using PHP Oriented Object.</p>
        </div>
        <div class="card-body p-5">
            <div class="form-group">
                <label for="inputEmail">Email:</label>
                <input type="email" name="input_email" id="inputEmail" placeholder="user@email.com"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <label for="inputPassword">Password:</label>
                <input type="password" name="input_pasword" id="inputPassword" placeholder="*****"
                       class="form-control"/>
            </div>
            <div class="form-group">
                <button name="login_user" class="btn btn-dark btn-block">
                    Login
                </button>
            </div>
        </div>
        <div class="card-header p-5 text-center">
            <h5>Bruno Dadario - All rights reserved.</h5>
        </div>
    </form>
</div>
</body>
</html>