<?php

namespace Core\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Component\HttpFoundation\RequestStack;

class JWTCreateSubscriber implements EventSubscriberInterface
{
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public static function getSubscribedEvents()
    {
        return [
            'lexik_jwt_authentication.on_jwt_created' => ['setJWTExpiration'],
        ];
    }

    public function setJWTExpiration(JWTCreatedEvent $event)
    {
        $request = json_decode($this->requestStack->getCurrentRequest()->getContent(),true);

        if(array_key_exists('maintainLogin', $request)) {
            $now = new \DateTime('NOW');
            if($request['maintainLogin']) {
                $expiration = date_add($now,date_interval_create_from_date_string("8760 hours"));
            }
            else {
                $expiration = date_add($now,date_interval_create_from_date_string("60 seconds"));
            }

            $payload = $event->getData();
            $payload['maintainLogin'] = $request['maintainLogin'];
            $payload['exp'] = $expiration->getTimestamp();

            $event->setData($payload);
        }
    }
}
