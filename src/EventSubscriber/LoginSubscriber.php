<?php

namespace Core\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\Cookie;

class LoginSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::RESPONSE => ['checkLoginSelection'],
        ];
    }

    public function checkLoginSelection(FilterResponseEvent $event)
    {
        $path = $event->getRequest()->getPathInfo();
        $responseContent = json_decode($event->getResponse()->getContent(),true);

        if($path !== '/api/login' || !$responseContent['token']) {
            return;
        }

        $vars = json_decode($event->getRequest()->getContent(),true);

        if($vars['maintainLogin']) {
            $cookie = new Cookie(
                'MAINTAIN_LOGIN',
                $vars['maintainLogin'],
                time() + 31536000
            );

            $response = $event->getResponse();
            $response->headers->setCookie($cookie);
        }
    }
}
