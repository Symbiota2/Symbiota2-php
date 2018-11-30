<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omcrowdsourcequeue
 *
 * @ORM\Table(name="omcrowdsourcequeue", uniqueConstraints={@ORM\UniqueConstraint(name="Index_omcrowdsource_occid", columns={"occid"})}, indexes={@ORM\Index(name="FK_omcrowdsourcequeue_uid", columns={"uidprocessor"})})
 * @ORM\Entity
 */
class Omcrowdsourcequeue
{
    /**
     * @var int
     *
     * @ORM\Column(name="idomcrowdsourcequeue", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idomcrowdsourcequeue;

    /**
     * @var int
     *
     * @ORM\Column(name="omcsid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $omcsid;

    /**
     * @var int
     *
     * @ORM\Column(name="reviewstatus", type="integer", precision=0, scale=0, nullable=false, options={"comment"="0=open,5=pending review, 10=closed"}, unique=false)
     */
    private $reviewstatus;

    /**
     * @var int|null
     *
     * @ORM\Column(name="points", type="integer", precision=0, scale=0, nullable=true, options={"comment"="0=fail, 1=minor edits, 2=no edits <default>, 3=excelled"}, unique=false)
     */
    private $points;

    /**
     * @var int
     *
     * @ORM\Column(name="isvolunteer", type="integer", precision=0, scale=0, nullable=false, options={"default"="1"}, unique=false)
     */
    private $isvolunteer = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Omoccurrences
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Omoccurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid", nullable=true)
     * })
     */
    private $occid;

    /**
     * @var \App\Entities\User
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uidprocessor", referencedColumnName="uid", nullable=true)
     * })
     */
    private $uidprocessor;


    /**
     * Get idomcrowdsourcequeue.
     *
     * @return int
     */
    public function getIdomcrowdsourcequeue()
    {
        return $this->idomcrowdsourcequeue;
    }

    /**
     * Set omcsid.
     *
     * @param int $omcsid
     *
     * @return Omcrowdsourcequeue
     */
    public function setOmcsid($omcsid)
    {
        $this->omcsid = $omcsid;

        return $this;
    }

    /**
     * Get omcsid.
     *
     * @return int
     */
    public function getOmcsid()
    {
        return $this->omcsid;
    }

    /**
     * Set reviewstatus.
     *
     * @param int $reviewstatus
     *
     * @return Omcrowdsourcequeue
     */
    public function setReviewstatus($reviewstatus)
    {
        $this->reviewstatus = $reviewstatus;

        return $this;
    }

    /**
     * Get reviewstatus.
     *
     * @return int
     */
    public function getReviewstatus()
    {
        return $this->reviewstatus;
    }

    /**
     * Set points.
     *
     * @param int|null $points
     *
     * @return Omcrowdsourcequeue
     */
    public function setPoints($points = null)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points.
     *
     * @return int|null
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Set isvolunteer.
     *
     * @param int $isvolunteer
     *
     * @return Omcrowdsourcequeue
     */
    public function setIsvolunteer($isvolunteer)
    {
        $this->isvolunteer = $isvolunteer;

        return $this;
    }

    /**
     * Get isvolunteer.
     *
     * @return int
     */
    public function getIsvolunteer()
    {
        return $this->isvolunteer;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Omcrowdsourcequeue
     */
    public function setNotes($notes = null)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes.
     *
     * @return string|null
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Omcrowdsourcequeue
     */
    public function setInitialtimestamp($initialtimestamp)
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    /**
     * Get initialtimestamp.
     *
     * @return \DateTime
     */
    public function getInitialtimestamp()
    {
        return $this->initialtimestamp;
    }

    /**
     * Set occid.
     *
     * @param \App\Entities\Omoccurrences|null $occid
     *
     * @return Omcrowdsourcequeue
     */
    public function setOccid(\App\Entities\Omoccurrences $occid = null)
    {
        $this->occid = $occid;

        return $this;
    }

    /**
     * Get occid.
     *
     * @return \App\Entities\Omoccurrences|null
     */
    public function getOccid()
    {
        return $this->occid;
    }

    /**
     * Set uidprocessor.
     *
     * @param \App\Entities\User|null $uidprocessor
     *
     * @return Omcrowdsourcequeue
     */
    public function setUidprocessor(\App\Entities\User $uidprocessor = null)
    {
        $this->uidprocessor = $uidprocessor;

        return $this;
    }

    /**
     * Get uidprocessor.
     *
     * @return \App\Entities\User|null
     */
    public function getUidprocessor()
    {
        return $this->uidprocessor;
    }
}
