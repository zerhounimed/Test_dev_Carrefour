<?php

namespace App\Controller;

use App\Service\SessionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class RequestsController extends AbstractController
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }
    /**
     * @Route("/api/{route<.+>}", name="proxy")
     */
    public function index(Request $request, SessionService $session)
    {
        return new Response($this->client->request(
            $request->getMethod(),
            "https://localhost:8000" . $request->getRequestUri(),
            [
                "auth_bearer" => $session->get("token"),
                'headers' => ["content-type" => "application/json"],
                'body' => $request->getContent(),
                "query" => $request->query->all(),
                'verify_peer' => false,
                'verify_host' => false,
            ]
        )->getContent(false));
    }
}
