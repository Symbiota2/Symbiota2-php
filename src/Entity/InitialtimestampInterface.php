<?php

namespace App\Entity;

interface InitialtimestampInterface
{
    public function setInitialtimestamp(\DateTimeInterface $initialtimestamp): InitialtimestampInterface;
}
