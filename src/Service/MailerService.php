<?php

namespace Core\Service;

use Core\Entity\Users;
use Swift_Message;

class MailerService
{
    private $mailer;
    private $twig;

    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $twig)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
    }

    public function sendRegistrationConfirmationEmail(Users $user)
    {
        $body = $this->twig->render(
            'email/confirmation.html.twig',
            [
                'user' => $user
            ]
        );

        $message = (new Swift_Message('Please confirm your Symbiota2 account'))
            ->setFrom('no_reply@symbiota2projectportal.org')
            ->setTo($user->getEmail())
            ->setBody($body, 'text/html');

        $this->mailer->send($message);
    }
}
