<?php

namespace App\Entity;

interface ModifiedtimestampInterface
{
    public function setModifiedtimestamp(\DateTimeInterface $initialtimestamp): ModifiedtimestampInterface;
}
