<?php

namespace App\Entities\Traits;

use App\Entities\User;
use EntityManager;

trait UsesPasswordGrant
{
    /**
     * @param string $userIdentifier
     * @return User
     */
    public function findForPassport($userIdentifier)
    {
        $userRepository = EntityManager::getRepository(get_class($this));
        return $userRepository->findOneByUsername($userIdentifier);
    }

}