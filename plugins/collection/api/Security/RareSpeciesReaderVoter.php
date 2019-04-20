<?php

namespace Collection\Security;

use Core\Entity\Users;
use Collection\Entity\Collections;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class RareSpeciesReaderVoter extends Voter
{
    private $em;
    private $collectionId = 0;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    protected function supports($attribute, $subject)
    {
        return ($attribute === 'RareSppReader');
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $vote = false;

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
        $q = $this->em->createQuery('SELECT ur FROM Core\Entity\UserRoles ur WHERE ur.userId = '.$authenticatedUserId);
        $resultArr = $q->iterate();
        foreach ($resultArr as $row) {
            $role = $row[0]->getRole();
            if($role === 'SuperAdmin') {
                $token->getUser()->addCurrentPermissions('SuperAdmin');
                $vote = true;
            }
            if($role === 'RareSppAdmin') {
                $token->getUser()->addCurrentPermissions('RareSppAdmin');
                $vote = true;
            }
            if($role === 'RareSppReadAll') {
                $token->getUser()->addCurrentPermissions('RareSppReadAll');
                $vote = true;
            }
            if($role === 'CollAdmin') {
                if($row[0]->getTableId() == $this->collectionId) {
                    $token->getUser()->addCurrentPermissions('CollAdmin');
                    $vote = true;
                }
            }
            if($role === 'CollEditor') {
                if($row[0]->getTableId() == $this->collectionId) {
                    $token->getUser()->addCurrentPermissions('CollEditor');
                    $vote = true;
                }
            }
            if($role === 'RareSppReader') {
                if($row[0]->getTableId() == $this->collectionId) {
                    $token->getUser()->addCurrentPermissions('RareSppReader');
                    $vote = true;
                }
            }
        }

        return $vote;
    }

}
