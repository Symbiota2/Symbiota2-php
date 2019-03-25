<?php

namespace App\Security;

use App\Entity\Users;
use App\Entity\ChecklistProjects;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class ProjectAdminVoter extends Voter
{
    private $em;
    private $projectId = 0;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    protected function supports($attribute, $subject)
    {
        return ($attribute === 'ProjAdmin');
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $vote = false;

        if(!$token->getUser() instanceof Users) {
            return false;
        }

        if ($subject instanceof ChecklistProjects) {
            $this->projectId = $subject->getId();
        }
        else {
            $this->projectId = $subject->getProjectId();
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
            if($role === 'ProjAdmin') {
                if($row[0]->getTableId() == $this->projectId) {
                    $token->getUser()->addCurrentPermissions('ProjAdmin');
                    $vote = true;
                }
            }
        }

        return $vote;
    }

}
