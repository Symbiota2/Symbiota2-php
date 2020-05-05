<?php

namespace Checklist\Security;

use Core\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class UserAdminVoter extends Voter
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    protected function supports($attribute, $subject): bool
    {
        return ($attribute === 'UserAdmin');
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token): bool
    {
        if(!$token->getUser() instanceof Users) {
            return false;
        }

        $authenticatedUserId = $token->getUser()->getId();
        $q = $this->em->createQuery('SELECT ur FROM Core\Entity\UserRoles ur WHERE ur.userId = '.$authenticatedUserId);
        $resultArr = $q->iterate();
        foreach ($resultArr as $row) {
            $role = $row[0]->getRole();
            if($role === 'SuperAdmin') {
                $token->getUser()->addCurrentPermissions('UserAdmin');
                return true;
            }
            if($role === 'ClAdmin') {
                $token->getUser()->addCurrentPermissions('UserAdmin');
                return true;
            }
            if($role === 'ProjAdmin') {
                $token->getUser()->addCurrentPermissions('UserAdmin');
                return true;
            }
        }

        return false;
    }

}
