# PHP-Login-OOP

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
    define('DB_NAME', 'mylogin'); // Database name
    define('DB_USER', 'root'); // MySQL username
    define('DB_PASSWORD', 'password123'); // MySQL password

Create Database

    CREATE DATABASE login;
    
    USE login;

Import SQL file that is in the repository.

    user_login.sql
    
In the .htaccess file, set the project folder path.

    php_value include_path "project folder path" 
    
    Example Windows : 
    php_value include_path "C:\xampp\htdocs\login"
    
    
![](/lib/git/login-page.png)

 

