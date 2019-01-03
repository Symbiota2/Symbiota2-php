<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurcomments
 *
 * @ORM\Table(name="omoccurcomments", indexes={@ORM\Index(name="fk_omoccurcomments_uid", columns={"uid"}), @ORM\Index(name="fk_omoccurcomments_occid", columns={"occid"})})
 * @ORM\Entity(repositoryClass="App\Repository\OmoccurcommentsRepository")
 */
class Omoccurcomments
{
    /**
     * @var int
     *
     * @ORM\Column(name="comid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $comid;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535, nullable=false)
     */
    private $comment;

    /**
     * @var int
     *
     * @ORM\Column(name="reviewstatus", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $reviewstatus;

    /**
     * @var int|null
     *
     * @ORM\Column(name="parentcomid", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $parentcomid = 'NULL';

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
     *   @ORM\JoinColumn(name="uid", referencedColumnName="uid")
     * })
     */
    private $uid;

    public function getComid(): ?int
    {
        return $this->comid;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

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

    public function getParentcomid(): ?int
    {
        return $this->parentcomid;
    }

    public function setParentcomid(?int $parentcomid): self
    {
        $this->parentcomid = $parentcomid;

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

    public function getUid(): ?Users
    {
        return $this->uid;
    }

    public function setUid(?Users $uid): self
    {
        $this->uid = $uid;

        return $this;
    }


}
