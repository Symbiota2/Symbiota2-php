<?php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\ModifieduidInterface;
use App\Entity\CreateduidInterface;
use App\Entity\UidassignedbyInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class CurrentUserSubscriber implements EventSubscriberInterface
{
    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['getAuthenticatedUser', EventPriorities::PRE_WRITE],
        ];
    }

    public function getAuthenticatedUser(GetResponseForControllerResultEvent $event)
    {
        $entity = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        /**
         * @var UserInterface $user
         */
        $user = $this->tokenStorage->getToken()->getUser();

        if((!$entity instanceof ModifieduidInterface && !$entity instanceof CreateduidInterface && !$entity instanceof UidassignedbyInterface) || !in_array($method, [Request::METHOD_POST, Request::METHOD_PUT])) {
            return;
        }

        if($entity instanceof ModifieduidInterface) {
            $entity->setModifieduid($user);
        }

        if($entity instanceof CreateduidInterface && Request::METHOD_POST === $method) {
            $entity->setCreateduid($user);
        }

        if($entity instanceof UidassignedbyInterface) {
            $entity->setUidassignedby($user);
        }
    }
}
