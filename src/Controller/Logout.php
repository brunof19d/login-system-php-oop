<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace Login\App\Controller;

use Login\App\Helper\FlashMessage;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Logout implements RequestHandlerInterface
{
    use FlashMessage;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        session_destroy();
        return new Response(200, ['Location' => '/home']);
    }
}