<?php

namespace App\Entity;

interface ModifiedTimestampInterface
{
    public function setModifiedTimestamp(\DateTimeInterface $initialtimestamp): ModifiedTimestampInterface;
}
