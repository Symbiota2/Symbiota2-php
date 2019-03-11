<?php

namespace App\Entity;

interface InitialTimestampInterface
{
    public function setInitialTimestamp(\DateTimeInterface $initialtimestamp): InitialTimestampInterface;
}
