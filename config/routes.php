<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

use Login\App\Controller\Logout;
use Login\App\Controller\MakeLogin;
use Login\App\View\HomeTemplate;
use Login\App\View\LoggedTemplate;

return [

    '/home' => HomeTemplate::class,
    '/logout' => Logout::class,
    '/logged' => LoggedTemplate::class,
    '/make-login' => MakeLogin::class

];