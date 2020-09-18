<?php
/**
 * Created by Bruno Dadario
 * brunof19d@gmail.com
 */


namespace Login\App\Infrastructure\Persistence;


use PDO;
use PDOException;

class DatabaseCreator
{
    /**
     * Connects to the database.
     * @return PDO
     * @throws PDOException
     */
    public static function getConnection(): PDO
    {
        $dsn = "mysql:dbname=" . DB_NAME . ";host=" . DB_HOST;
        $user = DB_USER;
        $password = DB_PASSWORD;

        try {
            $pdo = new PDO($dsn, $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $pdo;
    }
}