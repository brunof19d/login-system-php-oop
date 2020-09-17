<?php


namespace Login\App\Helper;


class Helper
{
    /**
     * Configure the error or success message to be displayed by the application.
     * @param string $message Message to be displayed by the application.
     * @param string $classBoostrap CSS class to be applied to the HTML element of the message.
     * @param string $url Redirect URL (By default redirects to the current page).
     * @param string $id ID User SESSION
     * @return void
     */
    public function setAlert(string $message, string $classBoostrap, string $url = '', string $id = 'msg'): void
    {
        $_SESSION[$id] = [
            'message' => $message,
            'class' => $classBoostrap
        ];
        $url = $url ? $url : $_SERVER['REQUEST_URI'];
        header("Location: $url");
        die();
    }

    /**
     * Returns the message saved in the application session.
     * @param string $id Key ID in the Session containing the message.
     * @return array|null
     */
    public function getAlert(string $id = 'msg')
    {
        $msg = $_SESSION[$id] ?? null;
        unset($_SESSION[$id]);
        return $msg;
    }

    /**
     * Returns the string message if User is Active or not.
     * @param int $active Number received by controller 1 or 0.
     * @return string
     */
    public function switchActiveName(int $active): string
    {
        if ($active == 1) {
            return 'Yes';
        }
        return 'No';
    }

    /**
     * Checks whether the URL / admin is being accessed.
     * @return bool
     */
    public function verifyUrlAdmin(): bool
    {
        if (strstr($_SERVER['REQUEST_URI'], '/admin/')) {
            return true;
        }
        return false;
    }

    /**
     * Message to view Layer.
     * @return void
     */
    public function messageHeaderHtml(): void
    {
        if ($this->verifyUrlAdmin()) {
            echo "Admin Page - Register User";
        } else {
            echo "Simple login using PHP Oriented Object";
        }
    }

    /**
     * Button Logout if the user is in admin page.
     * @return bool
     */
    public function messageLogout(): bool
    {
        if ($this->verifyUrlAdmin()) {
            return true;
        }
        return false;
    }

    /**
     * Sets the user's button depending on which page is.
     * @return void
     */
    public function defineButton(): void
    {
        if ($this->verifyUrlAdmin()) {
            echo "Register";
        } else {
            echo "Login";
        }
    }

    /**
     * Sets the user's [INPUT] button depending on which page is.
     * @return void
     */
    public function defineInputAttribute(): void
    {
        if ($this->verifyUrlAdmin()) {
            echo "register_user";
        } else {
            echo "login_user";
        }
    }
}