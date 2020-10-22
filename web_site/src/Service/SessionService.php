<?php
namespace App\Service;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SessionService
{
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function set(string $name, string $data)
    {
        $this->session->set($name, $data);

    }

    public function get(string $name)
    {
        return  $this->session->get($name);

    }
}