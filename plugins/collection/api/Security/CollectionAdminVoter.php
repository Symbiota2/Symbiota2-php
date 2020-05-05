<?php

namespace Collection\Security;

use Core\Entity\Users;
use Collection\Entity\Collections;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class CollectionAdminVoter extends Voter
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    protected function supports($attribute, $subject): bool
    {
        return ($attribute === 'CollAdmin');
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token): bool
    {
        $vote = false;

        if(!$token->getUser() instanceof Users) {
            return false;
        }

        $authenticatedUserId = $token->getUser()->getId();
        $q = $this->em->createQuery('SELECT ur FROM Core\Entity\UserRoles ur WHERE ur.userId = '.$authenticatedUserId);
        $resultArr = $q->iterate();
        foreach ($resultArr as $row) {
            $role = $row[0]->getRole();
            if($role === 'SuperAdmin') {
                $token->getUser()->addCurrentPermissions('SuperAdmin');
                $vote = true;
            }
            if(($role === 'CollAdmin') && $row[0]->getTableId() === $subject) {
                $token->getUser()->addCurrentPermissions('CollAdmin');
                $vote = true;
            }
        }

        return $vote;
    }

}
