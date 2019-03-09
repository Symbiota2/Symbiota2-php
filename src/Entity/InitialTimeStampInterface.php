<?php

namespace App\Entity;

interface InitialTimeStampInterface
{
    public function setInitialtimestamp(\DateTimeInterface $initialtimestamp): InitialTimeStampInterface;
}
