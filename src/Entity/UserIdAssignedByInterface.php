<?php

namespace Core\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

interface UserIdAssignedByInterface
{
    public function setUserIdAssignedBy(UserInterface $user): UserIdAssignedByInterface;
}
