<?php

namespace Login\App\Infrastructure\Repository;


use Login\App\Domain\Model\User;
use Login\App\Domain\Repository\UserRepository;
use Login\App\Infrastructure\Persistence\DatabaseCreator;
use PDO;
use PDOStatement;

class PdoUserRepository implements UserRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DatabaseCreator::getConnection();
    }

    /**
     * Returns the list of users registered in the system.
     * @return array
     */
    public function allUsers(): array
    {
        $sql = "SELECT * FROM user_login";
        $stmt = $this->pdo->query($sql);
        return $this->treatUserList($stmt);
    }

    /**
     * Treat the list received by the Database.
     * @param PDOStatement $stmt Statement $sql->AllUser.
     * @return array
     */
    private function treatUserList(PDOStatement $stmt): array
    {
        $userDataList = $stmt->fetchAll();
        $userList = [];

        foreach ($userDataList as $row) {
            $userData = new User();
            $userData->setId($row['user_id']);
            $userData->setEmail($row['email_user']);
            $userData->setPassword($row['password_user']);
            $userData->setActive($row['active_user']);
            array_push($userList, $userData);
        }
        return $userList;
    }

    /**
     * Register the user in the database.
     * @param User $user Class User setters and getters.
     * @return bool
     */
    public function save(User $user): bool
    {
        $sql = "INSERT INTO user_login (email_user, password_user) VALUES (:email_user, :password_user)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email_user', $user->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':password_user', $user->getPassword(), PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt) {
            return true;
        }
        return false;
    }

    /**
     * Verify the user(email) already in Database.
     * @param User $user Class User setters and getters.
     * @return bool
     */
    public function isUserAlreadyRegistered(User $user): bool
    {
        $sql = "SELECT * FROM user_login WHERE email_user = :email_user";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email_user', $user->getEmail(), PDO::PARAM_STR);
        $stmt->execute();

        $count = $stmt->rowCount();

        if ($count > 0) {
            return true;
        }
        return false;
    }

    /**
     * Delete user in Database.
     * @param User $user Class User setters and getters.
     * @return void
     */
    public function remove(User $user): void
    {
        $sql = "DELETE FROM user_login WHERE user_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $user->getId(), PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
     * Active or Inactive user in the database.
     * @param User $user Class User setters and getters.
     * @return void
     */
    public function update(User $user): void
    {
        $sql = "UPDATE user_login SET active_user = :active_user WHERE user_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':active_user', $user->getActive(), PDO::PARAM_INT);
        $stmt->bindValue(':id', $user->getId(), PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
     * Logs in an administrative user.
     * @param User $user Class User setters and getters.
     * @return bool
     */
    public function login(User $user): bool

    {
        $sql = "SELECT * FROM user_login WHERE email_user = :email_user";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email_user', $user->getEmail(), PDO::PARAM_STR);
        $stmt->execute();

        $count = $stmt->rowCount();

        if ($count > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            //Check password hash
            if (password_verify($user->getPassword(), $result['password_user'])) {
                return true;
            }
        }
        return false;
    }

    /**
     * Verify in database if this user active or not.
     * @param User $user Class User setters and getters.
     * @return bool
     */
    public function active(User $user): bool
    {
        $sql = "SELECT * FROM user_login WHERE email_user = :email_user AND active_user = :active_user";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email_user', $user->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':active_user', 1);
        $stmt->execute();

        $count = $stmt->rowCount();

        if ($count > 0) {
            return true;
        }
        return false;
    }
}