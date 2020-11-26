[![licence mit](https://img.shields.io/badge/licence-MIT-blue.svg)](https://github.com/brunof19d/login-system-php-oo/blob/master/LICENSE)

# PHP-Login-OOP

## About

This is a PHP login project, using object orientation programming.

Using PDO Drivers, we have the system performing the login, route system with easy implementation and scalability.
Following PHP PSR-FIG and good practices 

## Requirements

  - PHP 7.4 or higher with PDO drivers for MySQL.
  - MySQL 5.6 / MariaDB 10.0 or higher for spatial features in MySQL.
  - Composer.

## Installation
Run the command below to install all composer dependencies.

    composer install
    
Enable extension MySQL in your php.ini

    extension=pdo_mysql
    
## Configuration
In the <b>config/config.php</b> file, put all the necessary data to make the connection to the database.

    define('DB_HOST', 'localhost');
    define('DB_NAME', 'login'); // Database name
    define('DB_USER', 'root'); // MySQL username
    define('DB_PASSWORD', 'password123'); // MySQL password

Create Database.

    CREATE DATABASE login;
    
    USE login;

Import SQL file that is in the repository.

    schema.sql
    
Start php Server Development with a target for folder public

    php -S localhost:8080 -t public

Access by the browser.

    http://localhost:8080

The user registered in the database by default is

    email : admin@admin.com
    passwod : admin


