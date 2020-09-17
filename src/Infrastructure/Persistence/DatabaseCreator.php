<?php


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
        $dsn = 'mysql:dbname=mylogin;host=127.0.0.1';
        $user = 'root';
        $password = '';

        try {
            $pdo = new PDO($dsn, $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        return $pdo;
    }
}