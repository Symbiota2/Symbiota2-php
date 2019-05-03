<?php

namespace Core\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;

class LogoutController extends AbstractController
{
    /**
     * @Route(
     *     name="logout_user",
     *     path="/api/logout",
     *     methods={"GET"}
     * )
     */
    public function getAuthenticatedUser()
    {
        $res = new Response();
        $res->headers->clearCookie('BEARER');
        $res->send();
    }
}
