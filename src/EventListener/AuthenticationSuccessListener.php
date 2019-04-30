<?php

namespace Core\EventListener;

use Core\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\RequestStack;

class AuthenticationSuccessListener
{
    private $em;
    private $requestStack;

    public function __construct(EntityManagerInterface $em, RequestStack $requestStack)
    {
        $this->em = $em;
        $this->requestStack = $requestStack;
    }

    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
    {
        $permissionArr = array();
        $data = $event->getData();
        $user = $event->getUser();
        $userId = $user->getId();
        $request = json_decode($this->requestStack->getCurrentRequest()->getContent(),true);
        $maintainLogin = (array_key_exists('maintainLogin', $request)?$request['maintainLogin']:0);

        if (!$user instanceof Users) {
            return;
        }

        if($maintainLogin) {
            $cookieExp = time() + 31536000;
        }
        else {
            $cookieExp = time() + 9000;
        }

        $cookie = new Cookie(
            'BEARER',
            $data['token'],
            $cookieExp
        );

        $q = $this->em->createQuery('SELECT ur FROM Core\Entity\UserRoles ur WHERE ur.userId = '.$userId);
        $resultArr = $q->iterate();
        foreach ($resultArr as $row) {
            $permissionArr[$row[0]->getRole()][] = $row[0]->getTableId();
        }

        $data['id'] = $userId;
        $data['maintainLogin'] = $maintainLogin;
        $data['firstName'] = $user->getFirstName();
        $data['permissions'] = $permissionArr;

        $event->setData($data);
        $response = $event->getResponse();
        $response->headers->setCookie($cookie);
    }
}
