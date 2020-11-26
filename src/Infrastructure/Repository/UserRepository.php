<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace Login\App\Infrastructure\Repository;

use Login\App\Entity\User;
use Login\App\Infrastructure\Persistence\DatabaseCreator;
use PDO;

class UserRepository
{
    private PDO $database;

    public function __construct()
    {
        $this->database = DatabaseCreator::createConnection();
    }

    public function finOneBy(User $user): bool
    {
        $sql = "SELECT * FROM user WHERE email = :email";
        $statement = $this->database->prepare($sql);
        $statement->execute([
            ':email' => $user->getEmail()
        ]);
        $count = $statement->rowCount();

        if ($count > 0) {
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return password_verify($user->getPassword(), $result['password']);
        }

        return false;
    }
}