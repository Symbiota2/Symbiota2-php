<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

interface CreatedUserIdInterface
{
    public function setCreateduserid(UserInterface $user): CreatedUserIdInterface;
}
