<?php

namespace Core\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use Core\Entity\InitialTimestampInterface;
use Core\Entity\ModifiedTimestampInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class TimestampSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['setTimestamp', EventPriorities::PRE_WRITE],
        ];
    }

    public function setTimestamp(GetResponseForControllerResultEvent $event)
    {
        $entity = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if((!$entity instanceof InitialTimestampInterface && !$entity instanceof ModifiedTimestampInterface) || !in_array($method, [Request::METHOD_POST, Request::METHOD_PUT])) {
            return;
        }

        if($entity instanceof InitialTimestampInterface && Request::METHOD_POST === $method) {
            $entity->setInitialTimestamp(new \DateTime());
        }

        if($entity instanceof ModifiedTimestampInterface) {
            $entity->setModifiedTimestamp(new \DateTime());
        }
    }
}
