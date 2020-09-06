<?php

/**
 * @author           Bruno Dadario <brunof19d@gmail.com>
 * @copyright        (c) 2020, Bruno Dadario. All Rights Reserved.
 * @license          Lesser General Public License <http://www.gnu.org/copyleft/lesser.html>
 */


class UserRepository
{

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function registerUser(User $user)
    {
        $sqlInsert = "INSERT INTO user_login (email_user, password_user) VALUES (:email_user, :password_user)";

        $statement = $this->pdo->prepare($sqlInsert);;

        $statement->execute([
            'email_user'    => strip_tags($user->getEmail()),
            'password_user' => strip_tags($user->getPassword())
        ]);
    }
}
