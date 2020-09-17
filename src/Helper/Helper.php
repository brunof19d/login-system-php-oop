<?php


namespace Login\App\Helper;


class Helper
{
    public function setAlert(string $message, string $classBoostrap, string $url = '', string $id = 'msg')
    {
        $_SESSION[$id] = array(
            'message' => $message,
            'class' => $classBoostrap
        );

        $url = $url ? $url : $_SERVER['REQUEST_URI'];

        header("Location: $url");
        exit();
    }

    public function getAlert(string $id = 'msg')
    {
        $msg = $_SESSION[$id] ?? null;
        unset($_SESSION[$id]); // remove o dado da sessão

        return $msg;
    }

    public function switchActiveName($active): string
    {
        if ($active == 1) {
            return 'Yes';
        }

        return 'No';
    }

    public function verifyUrlAdmin(): bool
    {
        if (strstr($_SERVER['REQUEST_URI'], '/admin/')) {
            return true;
        }
        return false;
    }

    public function messageHeaderHtml(): void
    {
        if ($this->verifyUrlAdmin()) {
            echo "Admin Page - Register User";
        } else {
            echo "Simple login using PHP Oriented Object";
        }
    }

    public function messageLogout(): bool
    {
        if ($this->verifyUrlAdmin()) {
            return true;
        }
        return false;
    }

    public function defineButton(): void
    {
        if ($this->verifyUrlAdmin()) {
            echo "Register";
        } else {
            echo "Login";
        }
    }

    public function defineInputAttribute(): void
    {
        if ($this->verifyUrlAdmin()) {
            echo "register_user";
        } else {
            echo "login_user";
        }
    }
}