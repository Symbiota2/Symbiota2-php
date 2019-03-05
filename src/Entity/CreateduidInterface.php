<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

interface CreateduidInterface
{
    public function setCreateduid(UserInterface $user): CreateduidInterface;
}
