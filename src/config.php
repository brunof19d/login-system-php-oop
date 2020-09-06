<?php

/**
 * @author           Bruno Dadario <brunof19d@gmail.com>
 * @copyright        (c) 2020, Bruno Dadario. All Rights Reserved.
 * @license          Lesser General Public License <http://www.gnu.org/copyleft/lesser.html>
 */

require_once "lib/database.php";
require_once "model/User.php";
require_once "model/UserRepository.php";

$user = new User();
$user_repository = new UserRepository($pdo);
