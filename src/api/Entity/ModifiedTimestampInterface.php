<?php

namespace Core\Entity;

interface ModifiedTimestampInterface
{
    public function setModifiedTimestamp(\DateTimeInterface $initialtimestamp): ModifiedTimestampInterface;
}
