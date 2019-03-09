<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

interface UserIdAssignedByInterface
{
    public function setUseridassignedby(UserInterface $user): UserIdAssignedByInterface;
}
