<?php

namespace App\Security;

use App\Entity\Users;
use App\Entity\Collections;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class CollectionAdminVoter extends Voter
{
    private $em;
    private $collectionId = 0;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    protected function supports($attribute, $subject)
    {
        return ($attribute === 'CollAdmin');
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        if(!$token->getUser() instanceof Users) {
            return false;
        }

        if ($subject instanceof Collections) {
            $this->collectionId = $subject->getId();
        }
        else {
            $this->collectionId = $subject->getCollectionId();
        }

        $authenticatedUserId = $token->getUser()->getId();
        $q = $this->em->createQuery('SELECT ur FROM App\Entity\UserRoles ur WHERE ur.userId = '.$authenticatedUserId);
        $resultArr = $q->iterate();
        foreach ($resultArr as $row) {
            $role = $row[0]->getRole();
            if($role === 'CollAdmin') {
                if($row[0]->getTableId() == $this->collectionId) {
                    return true;
                }
            }
        }

        return false;
    }

}
