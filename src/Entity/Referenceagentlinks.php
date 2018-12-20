<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Referenceagentlinks
 *
 * @ORM\Table(name="referenceagentlinks")
 * @ORM\Entity(repositoryClass="App\Repository\ReferenceagentlinksRepository")
 */
class Referenceagentlinks
{
    /**
     * @var int
     *
     * @ORM\Column(name="refid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $refid;

    /**
     * @var int
     *
     * @ORM\Column(name="agentid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $agentid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    /**
     * @var int
     *
     * @ORM\Column(name="createdbyid", type="integer", nullable=false)
     */
    private $createdbyid;

    public function getRefid(): ?int
    {
        return $this->refid;
    }

    public function getAgentid(): ?int
    {
        return $this->agentid;
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

    public function getCreatedbyid(): ?int
    {
        return $this->createdbyid;
    }

    public function setCreatedbyid(int $createdbyid): self
    {
        $this->createdbyid = $createdbyid;

        return $this;
    }


}
