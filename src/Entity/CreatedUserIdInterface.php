<?php

namespace Core\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

interface CreatedUserIdInterface
{
    public function setCreatedUserId(UserInterface $user): CreatedUserIdInterface;
}
