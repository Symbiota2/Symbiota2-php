<?php

namespace App\Security;

use App\Entity\Users;
use App\Entity\Checklists;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class ChecklistAdminVoter extends Voter
{
    private $em;
    private $checklistId = 0;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    protected function supports($attribute, $subject)
    {
        return ($attribute === 'ClAdmin');
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $vote = false;

        if(!$token->getUser() instanceof Users) {
            return false;
        }

        if ($subject instanceof Checklists) {
            $this->checklistId = $subject->getId();
        }
        else {
            $this->checklistId = $subject->getChecklistId();
        }

        $authenticatedUserId = $token->getUser()->getId();
        $q = $this->em->createQuery('SELECT ur FROM App\Entity\UserRoles ur WHERE ur.userId = '.$authenticatedUserId);
        $resultArr = $q->iterate();
        foreach ($resultArr as $row) {
            $role = $row[0]->getRole();
            if($role === 'SuperAdmin') {
                $token->getUser()->addCurrentPermissions('SuperAdmin');
                $vote = true;
            }
            if($role === 'ClAdmin') {
                if($row[0]->getTableId() == $this->checklistId) {
                    $token->getUser()->addCurrentPermissions('ClAdmin');
                    $vote = true;
                }
            }
        }

        return $vote;
    }

}
