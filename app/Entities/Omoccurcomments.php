<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurcomments
 *
 * @ORM\Table(name="omoccurcomments", indexes={@ORM\Index(name="fk_omoccurcomments_occid", columns={"occid"}), @ORM\Index(name="fk_omoccurcomments_uid", columns={"uid"})})
 * @ORM\Entity
 */
class Omoccurcomments
{
    /**
     * @var int
     *
     * @ORM\Column(name="comid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $comid;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535, precision=0, scale=0, nullable=false, unique=false)
     */
    private $comment;

    /**
     * @var int
     *
     * @ORM\Column(name="reviewstatus", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     */
    private $reviewstatus;

    /**
     * @var int|null
     *
     * @ORM\Column(name="parentcomid", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $parentcomid;

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
     *   @ORM\JoinColumn(name="uid", referencedColumnName="uid", nullable=true)
     * })
     */
    private $uid;


    /**
     * Get comid.
     *
     * @return int
     */
    public function getComid()
    {
        return $this->comid;
    }

    /**
     * Set comment.
     *
     * @param string $comment
     *
     * @return Omoccurcomments
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment.
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set reviewstatus.
     *
     * @param int $reviewstatus
     *
     * @return Omoccurcomments
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
     * Set parentcomid.
     *
     * @param int|null $parentcomid
     *
     * @return Omoccurcomments
     */
    public function setParentcomid($parentcomid = null)
    {
        $this->parentcomid = $parentcomid;

        return $this;
    }

    /**
     * Get parentcomid.
     *
     * @return int|null
     */
    public function getParentcomid()
    {
        return $this->parentcomid;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Omoccurcomments
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
     * @return Omoccurcomments
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
     * Set uid.
     *
     * @param \App\Entities\User|null $uid
     *
     * @return Omoccurcomments
     */
    public function setUid(\App\Entities\User $uid = null)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid.
     *
     * @return \App\Entities\User|null
     */
    public function getUid()
    {
        return $this->uid;
    }
}
