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

    public function switchActiveName($active)
    {
        if ($active == 1) {
            return 'Yes';
        }

        return 'No';
    }
}