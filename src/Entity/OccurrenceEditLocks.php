<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OccurrenceEditLocks
 *
 * @ORM\Table(name="omoccureditlocks")
 * @ORM\Entity(repositoryClass="App\Repository\OccurrenceEditLocksRepository")
 */
class OccurrenceEditLocks
{
    /**
     * @var int
     *
     * @ORM\Column(name="occid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $occid;

    /**
     * @var int
     *
     * @ORM\Column(name="createduid", type="integer", nullable=false)
     */
    private $createduid;

    /**
     * @var int
     *
     * @ORM\Column(name="ts", type="integer", nullable=false)
     */
    private $ts;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getOccid(): ?int
    {
        return $this->occid;
    }

    public function getCreateduid(): ?int
    {
        return $this->createduid;
    }

    public function setCreateduid(int $createduid): self
    {
        $this->createduid = $createduid;

        return $this;
    }

    public function getTs(): ?int
    {
        return $this->ts;
    }

    public function setTs(int $ts): self
    {
        $this->ts = $ts;

        return $this;
    }

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }


}
