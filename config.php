<?php
/* Require autoload Composer */
require "vendor/autoload.php";

/* Composer */
use Login\App\Controller\AdminController;
use Login\App\Domain\Model\User;
use Login\App\Infrastructure\Repository\PdoUserRepository;

/* Config site */
define('SITE_URL', 'http://localhost/login-system-php-oo/'); // Put your URL project here

/* Call class using for controller */
$user = new User();
$result = new PdoUserRepository();
$app = new AdminController();
