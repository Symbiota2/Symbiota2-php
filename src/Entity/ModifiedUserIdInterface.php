<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

interface ModifiedUserIdInterface
{
    public function setModifieduserid(UserInterface $user): ModifiedUserIdInterface;
}
