<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace Login\App\Infrastructure\Persistence;

use PDO;
use PDOException;

class DatabaseCreator
{
    public static function createConnection(): PDO
    {
        $dsn = "mysql:dbname=" . DB_NAME . ";host=" . DB_HOST;
        $user = DB_USER;
        $password = DB_PASSWORD;

        try {
            $database = new PDO($dsn, $user, $password);
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $database;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            die();
        }
    }
}
