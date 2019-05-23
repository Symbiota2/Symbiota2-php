<?php

namespace Core\Guard;

use Core\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Exception\AccountStatusException;
use Symfony\Component\Security\Core\Exception\DisabledException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class ValidUserCheck implements UserCheckerInterface
{
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function checkPreAuth(UserInterface $user)
    {
        if(!$user instanceof Users) {
            return;
        }

        if($user->getVerified() !== 1) {
            throw new DisabledException();
        }
    }

    public function checkPostAuth(UserInterface $user)
    {
        $user->setLastLoginDate(new \DateTime());

        $this->em->flush();
    }

}
