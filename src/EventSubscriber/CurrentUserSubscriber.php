<?php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\ModifiedUserIdInterface;
use App\Entity\CreatedUserIdInterface;
use App\Entity\UserIdAssignedByInterface;
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

        if((!$entity instanceof ModifiedUserIdInterface && !$entity instanceof CreatedUserIdInterface && !$entity instanceof UserIdAssignedByInterface) || !in_array($method, [Request::METHOD_POST, Request::METHOD_PUT])) {
            return;
        }

        if($entity instanceof ModifiedUserIdInterface) {
            $entity->setModifieduserid($user);
        }

        if($entity instanceof CreatedUserIdInterface && Request::METHOD_POST === $method) {
            $entity->setCreateduid($user);
        }

        if($entity instanceof UserIdAssignedByInterface) {
            $entity->setUseridassignedby($user);
        }
    }
}
