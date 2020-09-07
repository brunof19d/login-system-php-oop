<?php

class UserRepository
{

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function registerUser(User $user): void
    {
        $sqlInsert = "INSERT INTO user_login (email_user, password_user) VALUES (:email_user, :password_user)";
        $statement = $this->pdo->prepare($sqlInsert);;
        $statement->execute([
            'email_user'    => $user->getEmail(),
            'password_user' => password_hash($user->getPassword(), PASSWORD_DEFAULT)
        ]);
    }

    public function searchUsers(): array
    {
        $sqlSelect = "SELECT * FROM user_login";
        $statement = $this->pdo->query($sqlSelect);
        $result = $statement->fetchAll();
        return $result;
    }

    public function isRegisteredUser(string $email): bool
    {
        $sql = "SELECT email_user FROM user_login WHERE email_user =  ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        $count = $stmt->rowCount();

        if ($count > 0) {
            return true;
        }
        return false;
    }
}
