<?php

class DatabaseRepository extends PDO
{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function saveUser(User $task)
    {
        $sqlSave = 
            "INSERT INTO mylogin 
            (username, password)
            VALUES
            (:username, :password)"
        ;

        $query = $this->pdo->prepare($sqlSave);

        $query->execute([
            'username'   => $task->getUsername(),
            'password'   => $task->getPassword(),
        ]);
    }
    
}