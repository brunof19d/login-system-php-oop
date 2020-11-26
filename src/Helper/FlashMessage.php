<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace Login\App\Helper;

trait FlashMessage
{
    /**
     * @param string $class
     * @param string $message
     */
    public function message(string $class, string $message): void
    {
        $_SESSION['message'] = $message;
        $_SESSION['class'] = $class;
    }
}