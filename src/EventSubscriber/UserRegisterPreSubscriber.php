<?php

namespace Core\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use Core\Entity\Users;
use Core\Guard\TokenGenerator;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserRegisterPreSubscriber implements EventSubscriberInterface
{
    private $passwordEncoder;
    private $tokenGenerator;

    public function __construct(
        UserPasswordEncoderInterface $passwordEncoder,
        TokenGenerator $tokenGenerator
    )
    {
        $this->passwordEncoder = $passwordEncoder;
        $this->tokenGenerator = $tokenGenerator;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['registerUser', EventPriorities::PRE_WRITE],
        ];
    }

    public function registerUser(GetResponseForControllerResultEvent $event)
    {
        $user = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if (!$user instanceof Users || $method != Request::METHOD_POST) {
            return;
        }

        $user->setPassword(
            $this->passwordEncoder->encodePassword($user, $user->getPassword())
        );

        $user->setVerificationToken(
            $this->tokenGenerator->getVerificationToken()
        );
    }
}
