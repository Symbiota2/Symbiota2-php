<?php

namespace Core\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTAuthenticatedEvent;

class JWTAuthenticatedSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            'lexik_jwt_authentication.on_jwt_authenticated' => ['setJWTAuthenticatedUser'],
        ];
    }

    public function setJWTAuthenticatedUser(JWTAuthenticatedEvent $event)
    {
        $payload = $event->getPayload();
        $maintainLogin = (array_key_exists('maintainLogin', $payload)?$payload['maintainLogin']:0);
        $tokenCreated = $payload['iat'];
        $tokenExpire = $payload['exp'];

        $event->getToken()->getUser()->setMaintainLogin($maintainLogin);
        $event->getToken()->getUser()->setTokenExpiration(($tokenExpire - $tokenCreated));
    }
}
