<?php

/**
 * @author           Bruno Dadario <brunof19d@gmail.com>
 * @copyright        (c) 2020, Bruno Dadario. All Rights Reserved.
 * @license          Lesser General Public License <http://www.gnu.org/copyleft/lesser.html>
 */

require_once "lib/database.php";
require_once "lib/helper.php";

if (!session_id()) {
    session_start();
}

spl_autoload_register(function ($nameClass) {
    $path_to_class = __DIR__ . '/model/' . $nameClass . '.php';
    if (file_exists($path_to_class)) {
        require_once $path_to_class;
    } else {
        throw new Exception("Unable to load: $nameClass");
    }
});

$user = new User();
$user_repository = new UserRepository($pdo);
