<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace Login\App\View;

use Login\App\Helper\RenderTemplate;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class HomeTemplate implements RequestHandlerInterface
{
    use RenderTemplate;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $tokenCsrf = $this->csrfToken();

        $template = $this->render('home.php', [
            'title' => 'Login System',
            'token' => $tokenCsrf
        ]);

        return new Response(200, [], $template);
    }

    private function csrfToken(): string
    {
        $_SESSION['csrf_token'] = sha1(rand(1, 100));
        return $_SESSION['csrf_token'];
    }
}