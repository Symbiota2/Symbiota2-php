<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

interface ModifieduidInterface
{
    public function setModifieduid(UserInterface $user): ModifieduidInterface;
}
