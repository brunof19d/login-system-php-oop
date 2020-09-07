<?php

/**
 * @author           Bruno Dadario <brunof19d@gmail.com>
 * @copyright        (c) 2020, Bruno Dadario. All Rights Reserved.
 * @license          Lesser General Public License <http://www.gnu.org/copyleft/lesser.html>
 */

/**
 * Settings message error or success the show in application
 * @param string $message   Message to show
 * @param string $class     Classs Bootstrap
 * @param string $url       URL Redirect ( Default this same page )
 * @param string $id        ID Session message
 * @return void
 */
function set_message(string $message, string $class, string $url = '', string $id = 'message')
{

    $id = 'message';

    $_SESSION[$id] = [
        'message'   => $message,
        'class'     => $class
    ];

    if (!$url) {
        $url = $_SERVER['REQUEST_URI'];
    } else {
        $url;
    }

    // $url = $_SERVER['REQUEST_URI'];

    header("Location: $url");
    die();
}

/**
 * Returns the message saved in the application session.
 * @param string $id    ID session message
 * @return array|null
 */
function get_message(string $id = 'message')
{
    $message = $_SESSION[$id] ?? null;

    unset($_SESSION[$id]);

    return $message;
}

/**
 * Validate input with functions PHP
 * @param $data     String sent from FORM POST
 * @return string
 */
function test_input($data)
{

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
