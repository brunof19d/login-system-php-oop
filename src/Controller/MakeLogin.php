<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace Login\App\Controller;

use Login\App\Entity\User;
use Login\App\Helper\FlashMessage;
use Login\App\Infrastructure\Repository\UserRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class MakeLogin implements RequestHandlerInterface
{
    use FlashMessage;

    private UserRepository $repository;
    private User $user;

    public function __construct(UserRepository $repository, User $user)
    {
        $this->repository = $repository;
        $this->user = $user;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        try {
            // Data received by the form
            $data = $request->getParsedBody();

            // Check CSRF Token
            $token = $this->checkCsrfToken($data['csrf_token']);
            if ($token === FALSE) throw new \Exception('CSRF Token invalid');

            // Validate E-mail
            $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
            if ($email === FALSE) throw new \Exception('E-mail invalid');

            // Sanitize string password
            $password = filter_var($data['password'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
            if ($password === FALSE) throw new \Exception('Password invalid');

            // Setters User
            $this->user
                ->setEmail($email)
                ->setPassword($password);

            // Make Login
            $login = $this->repository->finOneBy($this->user);
            if ($login === FALSE) throw new \Exception('E-mail or password wrong');

            // Start session Login
            $_SESSION['auth'] = sha1(rand(1, 200));

            $this->message('success', 'Login successfully');
            return new Response(200, ['Location' => '/logged']);
        } catch (\Exception $exception) {
            $this->message('danger', $exception->getMessage());
            return new Response(302, ['Location' => '/home']);
        }
    }

    /**
     * Check that the csrf_token session exists and that the session is the same as the data received by the form.
     * @param string $token Data $_SESSION
     * @return bool
     */
    private function checkCsrfToken(string $token): bool
    {
        if (empty($_SESSION['csrf_token']) === FALSE) {

            if ($_SESSION['csrf_token'] === $token) {
                return true;
            }

            return false;
        }

        return false;
    }
}