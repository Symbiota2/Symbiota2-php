<?php

namespace App\Security;

use App\Entity\Users;
use App\Service\PermissionsService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class SuperAdminVoter extends Voter
{
    private $em;
    private $ps;

    public function __construct(EntityManagerInterface $em, PermissionsService $ps)
    {
        $this->em = $em;
    }

    protected function supports($attribute, $subject)
    {
        return ($attribute === 'SuperAdmin');
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        if(!$token->getUser() instanceof Users) {
            return false;
        }

        $authenticatedUserId = $token->getUser()->getId();
        $q = $this->em->createQuery('SELECT ur FROM App\Entity\UserRoles ur WHERE ur.userId = '.$authenticatedUserId);
        $resultArr = $q->iterate();
        foreach ($resultArr as $row) {
            $role = $row[0]->getRole();
            if($role === 'SuperAdmin') {
                $token->getUser()->addCurrentPermissions('SuperAdmin');
                return true;
            }
        }

        return false;
    }

}
