<?php

namespace Core\Service;

use Core\Entity\Users;
use Twig\Environment as TwigEnvironment;
use Swift_Message;

class MailerService
{
    private $mailer;
    private $twig;

    public function __construct(\Swift_Mailer $mailer, TwigEnvironment $twig)
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

        $message = (new Swift_Message('Please confirm your account'))
            ->setFrom('no_reply@symbiota2projectportal.org')
            ->setTo($user->getEmail())
            ->setBody($body, 'text/html');

        $this->mailer->send($message);
    }

    public function sendPasswordResetEmail(Users $user, string $password)
    {
        $body = $this->twig->render(
            'email/passwordreset.html.twig',
            [
                'user' => $user,
                'password' => $password
            ]
        );

        $message = (new Swift_Message('Password reset notice'))
            ->setFrom('no_reply@symbiota2projectportal.org')
            ->setTo($user->getEmail())
            ->setBody($body, 'text/html');

        $this->mailer->send($message);
    }

    public function sendRetrieveLoginEmail(Users $user)
    {
        $body = $this->twig->render(
            'email/retrievelogin.html.twig',
            [
                'user' => $user
            ]
        );

        $message = (new Swift_Message('Your user login'))
            ->setFrom('no_reply@symbiota2projectportal.org')
            ->setTo($user->getEmail())
            ->setBody($body, 'text/html');

        $this->mailer->send($message);
    }
}
