<?php

namespace App\Entity;

interface ModifiedTimeStampInterface
{
    public function setModifiedtimestamp(\DateTimeInterface $initialtimestamp): ModifiedTimeStampInterface;
}
