<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OccurrenceComments
 *
 * @ORM\Table(name="omoccurcomments", indexes={@ORM\Index(name="fk_omoccurcomments_uid", columns={"createduid"}), @ORM\Index(name="fk_omoccurcomments_occid", columns={"occid"})})
 * @ORM\Entity(repositoryClass="App\Repository\OccurrenceCommentsRepository")
 */
class OccurrenceComments
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
     * @var \Occurrences
     *
     * @ORM\ManyToOne(targetEntity="Occurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     * })
     */
    private $occid;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535, nullable=false)
     */
    private $comment;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="createduid", referencedColumnName="uid")
     * })
     */
    private $createduid;

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

    public function getOccid(): ?Occurrences
    {
        return $this->occid;
    }

    public function setOccid(?Occurrences $occid): self
    {
        $this->occid = $occid;

        return $this;
    }

    public function getCreateduid(): ?Users
    {
        return $this->createduid;
    }

    public function setCreateduid(?Users $createduid): self
    {
        $this->createduid = $createduid;

        return $this;
    }


}
