<?php
/**
 * Created by Bruno Dadario
 * brunof19d@gmail.com
 */

namespace Login\App\Domain\Repository;


use Login\App\Domain\Model\User;

interface UserRepository
{
    public function allUsers(): array;

    public function save(User $user): bool;

    public function update(User $user): void;

    public function remove(User $user): void;

    public function login(User $user): bool;

    public function active(User $user): bool;

    public function isUserAlreadyRegistered(User $user): bool;
}