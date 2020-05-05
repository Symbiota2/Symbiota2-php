<?php

namespace Checklist\Security;

use Core\Entity\Users;
use Checklist\Entity\Checklists;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class ChecklistAdminVoter extends Voter
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    protected function supports($attribute, $subject): bool
    {
        return ($attribute === 'ClAdmin');
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token): bool
    {
        $vote = false;

        if(!$token->getUser() instanceof Users) {
            return false;
        }

        if ($subject instanceof Checklists) {
            $checklistId = $subject->getId();
        }
        else {
            $checklistId = $subject->getChecklistId();
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
            if(($role === 'ClAdmin') && $row[0]->getTableId() === $checklistId) {
                $token->getUser()->addCurrentPermissions('ClAdmin');
                $vote = true;
            }
        }

        return $vote;
    }

}
