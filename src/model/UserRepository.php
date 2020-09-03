<?php
/**
 * @author           Bruno Dadario <brunof19d@gmail.com>
 * @copyright        (c) 2020, Bruno Dadario. All Rights Reserved.
 * @license          Lesser General Public License <http://www.gnu.org/copyleft/lesser.html>
 */


class UserRepository
{
    public function __construct(PDO $pdo) 
    {
        $this->pdo = $pdo;
    }
}