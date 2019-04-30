<?php

namespace Core\EventListener;

use Core\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use Symfony\Component\HttpFoundation\Cookie;

class AuthenticationSuccessListener
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
    {
        $permissionArr = array();
        $data = $event->getData();
        $user = $event->getUser();
        $userId = $user->getId();

        if (!$user instanceof Users) {
            return;
        }

        $cookie = new Cookie(
            'BEARER',
            $data['token'],
            time() + 63072000
        );

        $q = $this->em->createQuery('SELECT ur FROM Core\Entity\UserRoles ur WHERE ur.userId = '.$userId);
        $resultArr = $q->iterate();
        foreach ($resultArr as $row) {
            $permissionArr[$row[0]->getRole()][] = $row[0]->getTableId();
        }

        $data['id'] = $userId;
        $data['firstName'] = $user->getFirstName();
        $data['permissions'] = $permissionArr;

        $event->setData($data);
        $response = $event->getResponse();
        $response->headers->setCookie($cookie);
    }
}
