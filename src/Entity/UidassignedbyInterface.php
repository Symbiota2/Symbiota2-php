<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

interface UidassignedbyInterface
{
    public function setUidassignedby(UserInterface $user): UidassignedbyInterface;
}
