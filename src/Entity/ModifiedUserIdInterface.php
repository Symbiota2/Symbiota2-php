<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

interface ModifiedUserIdInterface
{
    public function setModifiedUserId(UserInterface $user): ModifiedUserIdInterface;
}
