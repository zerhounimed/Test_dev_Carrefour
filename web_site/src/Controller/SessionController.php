<?php

namespace App\Controller;

use App\Service\SessionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class SessionController extends AbstractController
{

    /**
     * @Route("/session", methods="POST")
     */
    public function create(Request $request, SessionService $session)
    {
        $data = json_decode($request->getContent(), true);

        $session->set($data["name"], $data["data"]);


        return new Response();
    }

    /**
     * @Route("/session", methods="GET")
     */
    public function getRequest(Request $request, SessionService $session)
    {
        return new Response($session->get($request->query->get("name")));
    }







}
