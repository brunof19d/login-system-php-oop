<?php
/**
 * Created by Bruno Dadario
 * brunof19d@gmail.com
 */

/* Require autoload Composer */
require "vendor/autoload.php";

/* Composer */
use Login\App\Controller\AdminController;
use Login\App\Controller\LoginController;
use Login\App\Domain\Model\User;
use Login\App\Helper\Helper;
use Login\App\Infrastructure\Repository\PdoUserRepository;

/* Config Database */
define('DB_HOST', 'localhost'); // Example: localhost, 127.0.0.1, www.domain.com
define('DB_NAME', 'mylogin'); // Database name
define('DB_USER', 'root'); // MySQL username
define('DB_PASSWORD', ''); // MySQL password

/* Config site */
define('SITE_URL', 'http://localhost/login-system-php-oo/'); // Put your URL project here

/* Enables the use of sessions in our application */
if (!session_id()) {
    session_start();
}

/* Call class using for controller */
$user = new User();
$result = new PdoUserRepository();
$controller = new AdminController();
$message = new Helper();
$login = new LoginController();

/* Logs the user out */
if (isset($_GET['logout'])) {
    $login->logout();
}

/* Block admin access */
$login->blockAdmin();

