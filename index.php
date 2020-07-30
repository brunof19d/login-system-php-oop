<?php

include 'User.php';
include 'DatabaseRepository.php';

$user = new User;
$db = new DatabaseRepository($pdo);

if (array_key_exists('username', $_POST)) {
    $user->setUsername($_POST['username']);
}

if (array_key_exists('password', $_POST)) {
    $user->setPassword($_POST['password']);
}

$db->saveUser($user);
header('Location: index.php');

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">

    <title>Title</title>
</head>

<header>
    <a href="">
        <h1> Simple Login system</h1>
    </a>
</header>
<hr>

<body>
    <div class="main-conteiner">

        <form class="login-conteiner" action="#" method="post">
            <input class="input-form" type="text" name="username" placeholder="E-mail" value="">
            <input class="input-form" type="text" name="password" placeholder="Password" value="">
            <button class="btn" type="submit" name="button">Login</button>
            <input class="input-form" type="checkbox">
            <label>Remember Me</label>
            <a class="Href" href="">Forgot Password</a>
            <a class="Href" href="">Register</a>
        </form>

    </div>
</body>

<hr>
<footer>
    <h2>By Me</h2>
</footer>

<?php

echo $user->getUsername() . PHP_EOL;

echo $user->getPassword();

?>

</html>