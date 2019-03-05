<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

interface CurrentUserInterface
{
    public function setModifieduid(UserInterface $user): CurrentUserInterface;
}
