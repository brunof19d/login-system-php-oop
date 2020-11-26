<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace Login\App\View;

use Login\App\Helper\FlashMessage;
use Login\App\Helper\RenderTemplate;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class LoggedTemplate implements RequestHandlerInterface
{
    use RenderTemplate;
    use FlashMessage;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if (isset($_SESSION['auth']) === FALSE) {
            $this->message('danger', 'Not authorized');
            return new Response(302, ['Location' => '/home']);
        }

        $template = $this->render('logged.php', [
            'title' => 'Login System | Logged'
        ]);

        return new Response(200, [], $template);
    }
}