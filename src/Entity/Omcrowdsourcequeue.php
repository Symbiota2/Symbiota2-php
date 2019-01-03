<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omcrowdsourcequeue
 *
 * @ORM\Table(name="omcrowdsourcequeue", uniqueConstraints={@ORM\UniqueConstraint(name="Index_omcrowdsource_occid", columns={"occid"})}, indexes={@ORM\Index(name="FK_omcrowdsourcequeue_uid", columns={"uidprocessor"})})
 * @ORM\Entity(repositoryClass="App\Repository\OmcrowdsourcequeueRepository")
 */
class Omcrowdsourcequeue
{
    /**
     * @var int
     *
     * @ORM\Column(name="idomcrowdsourcequeue", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idomcrowdsourcequeue;

    /**
     * @var int
     *
     * @ORM\Column(name="omcsid", type="integer", nullable=false)
     */
    private $omcsid;

    /**
     * @var int
     *
     * @ORM\Column(name="reviewstatus", type="integer", nullable=false, options={"comment"="0=open,5=pending review, 10=closed"})
     */
    private $reviewstatus;

    /**
     * @var int|null
     *
     * @ORM\Column(name="points", type="integer", nullable=true, options={"default"=NULL,"comment"="0=fail, 1=minor edits, 2=no edits <default>, 3=excelled"})
     */
    private $points = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="isvolunteer", type="integer", nullable=false, options={"default"="1"})
     */
    private $isvolunteer = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Omoccurrences
     *
     * @ORM\ManyToOne(targetEntity="Omoccurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     * })
     */
    private $occid;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uidprocessor", referencedColumnName="uid")
     * })
     */
    private $uidprocessor;

    public function getIdomcrowdsourcequeue(): ?int
    {
        return $this->idomcrowdsourcequeue;
    }

    public function getOmcsid(): ?int
    {
        return $this->omcsid;
    }

    public function setOmcsid(int $omcsid): self
    {
        $this->omcsid = $omcsid;

        return $this;
    }

    public function getReviewstatus(): ?int
    {
        return $this->reviewstatus;
    }

    public function setReviewstatus(int $reviewstatus): self
    {
        $this->reviewstatus = $reviewstatus;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(?int $points): self
    {
        $this->points = $points;

        return $this;
    }

    public function getIsvolunteer(): ?int
    {
        return $this->isvolunteer;
    }

    public function setIsvolunteer(int $isvolunteer): self
    {
        $this->isvolunteer = $isvolunteer;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

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

    public function getOccid(): ?Omoccurrences
    {
        return $this->occid;
    }

    public function setOccid(?Omoccurrences $occid): self
    {
        $this->occid = $occid;

        return $this;
    }

    public function getUidprocessor(): ?Users
    {
        return $this->uidprocessor;
    }

    public function setUidprocessor(?Users $uidprocessor): self
    {
        $this->uidprocessor = $uidprocessor;

        return $this;
    }


}
