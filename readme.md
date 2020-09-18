# PHP-Login-OOP

## About

This is a PHP login project, using object orientation.

Using PDO Drivers, we have the system performing the login, checking all the data received, validating and with an administrative panel in which you can register, delete and activate / deactivate the powers of the admin.

Using as simple HTML front-end and bootstrap, nothing exceptional.

## Requirements

  - PHP 7.4 or higher with PDO drivers for MySQL.
  - MySQL 5.6 / MariaDB 10.0 or higher for spatial features in MySQL.
  - Composer.

## Installation
Run the command below to install all composer dependencies.

    composer install
    
## Configuration
In the config.php file, put all the necessary data to make the connection to the database.

    define('DB_HOST', 'localhost');
    define('DB_NAME', 'login'); // Database name
    define('DB_USER', 'root'); // MySQL username
    define('DB_PASSWORD', 'password123'); // MySQL password

Create Database.

    CREATE DATABASE login;
    
    USE login;

Import SQL file that is in the repository.

    user_login.sql
    
In the .htaccess file, set the project folder path.

    php_value include_path "project folder path" 
    
    Example Windows : 
    php_value include_path "C:\xampp\htdocs\login"
    
Access by the browser.

    http://localhost/login

You will see the system login screen.

![](/lib/git/login-page.png)

The user registered in the database by default is

    email : admin@admin.com
    passwod : admin

After that you will see the admin screen, where you can register a user, delete and activate / deactivate.

![](/lib/git/register-page.png)
 

