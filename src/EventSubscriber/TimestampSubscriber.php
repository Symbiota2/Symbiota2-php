<?php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\InitialtimestampInterface;
use App\Entity\ModifiedtimestampInterface;
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

        if((!$entity instanceof InitialtimestampInterface && !$entity instanceof ModifiedtimestampInterface) || !in_array($method, [Request::METHOD_POST, Request::METHOD_PUT])) {
            return;
        }

        if($entity instanceof InitialtimestampInterface && Request::METHOD_POST === $method) {
            $entity->setInitialtimestamp(new \DateTime());
        }

        if($entity instanceof ModifiedtimestampInterface) {
            $entity->setModifiedtimestamp(new \DateTime());
        }
    }
}
