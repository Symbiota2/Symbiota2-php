<?php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\InitialTimeStampInterface;
use App\Entity\ModifiedTimeStampInterface;
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

        if((!$entity instanceof InitialTimeStampInterface && !$entity instanceof ModifiedTimeStampInterface) || !in_array($method, [Request::METHOD_POST, Request::METHOD_PUT])) {
            return;
        }

        if($entity instanceof InitialTimeStampInterface && Request::METHOD_POST === $method) {
            $entity->setInitialtimestamp(new \DateTime());
        }

        if($entity instanceof ModifiedTimeStampInterface) {
            $entity->setModifiedtimestamp(new \DateTime());
        }
    }
}
