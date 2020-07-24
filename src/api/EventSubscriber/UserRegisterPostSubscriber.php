<?php

namespace Core\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use Core\Entity\Users;
use Core\Service\MailerService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class UserRegisterPostSubscriber implements EventSubscriberInterface
{
    private $mailer;

    public function __construct(MailerService $mailer)
    {
        $this->mailer = $mailer;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['sendRegisterConfirmation', EventPriorities::POST_WRITE],
        ];
    }

    public function sendRegisterConfirmation(ViewEvent $event)
    {
        $user = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if (!$user instanceof Users || $method != Request::METHOD_POST) {
            return;
        }

        $this->mailer->sendRegistrationConfirmationEmail($user);
    }
}
