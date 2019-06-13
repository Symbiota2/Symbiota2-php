<?php

namespace OccurrenceDataset\Security;

use Core\Entity\Users;
use OccurrenceDataset\Entity\Datasets;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class DatasetEditorVoter extends Voter
{
    private $em;
    private $datasetId = 0;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    protected function supports($attribute, $subject)
    {
        return ($attribute === 'DatasetEditor');
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $vote = false;

        if(!$token->getUser() instanceof Users) {
            return false;
        }

        if ($subject instanceof Datasets) {
            $this->datasetId = $subject->getId();
        }
        else {
            $this->datasetId = $subject->getDatasetId();
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
            if($role === 'DatasetAdmin') {
                if($row[0]->getTableId() == $this->datasetId) {
                    $token->getUser()->addCurrentPermissions('DatasetAdmin');
                    $vote = true;
                }
            }
            if($role === 'DatasetEditor') {
                if($row[0]->getTableId() == $this->datasetId) {
                    $token->getUser()->addCurrentPermissions('DatasetEditor');
                    $vote = true;
                }
            }
        }

        return $vote;
    }

}
