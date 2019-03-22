<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * OccurrenceComments
 *
 * @ORM\Table(name="omoccurcomments", indexes={@ORM\Index(name="fk_omoccurcomments_uid", columns={"createduid"}), @ORM\Index(name="fk_omoccurcomments_occid", columns={"occid"})})
 * @ORM\Entity(repositoryClass="App\Repository\OccurrenceCommentsRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class OccurrenceComments implements CreatedUserIdInterface, InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="comid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\Entity\Occurrences
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Occurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid", nullable=false)
     * })
     */
    private $occurrenceId;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535)
     * @Assert\NotBlank()
     * @Assert\Length(max=65535)
     */
    private $comment;

    /**
     * @var \App\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="createduid", referencedColumnName="uid")
     * })
     */
    private $createdUserId;

    /**
     * @var int
     *
     * @ORM\Column(name="reviewstatus", type="integer", options={"unsigned"=true})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $reviewStatus;

    /**
     * @var \App\Entity\OccurrenceComments
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\OccurrenceComments")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parentcomid", referencedColumnName="comid")
     * })
     */
    private $parentCommentId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getReviewStatus(): ?int
    {
        return $this->reviewStatus;
    }

    public function setReviewStatus(int $reviewStatus): self
    {
        $this->reviewStatus = $reviewStatus;

        return $this;
    }

    public function getParentCommentId(): ?OccurrenceComments
    {
        return $this->parentCommentId;
    }

    public function setParentCommentId(?OccurrenceComments $parentCommentId): self
    {
        $this->parentCommentId = $parentCommentId;

        return $this;
    }

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }

    public function getOccurrenceId(): ?Occurrences
    {
        return $this->occurrenceId;
    }

    public function setOccurrenceId(?Occurrences $occurrenceId): self
    {
        $this->occurrenceId = $occurrenceId;

        return $this;
    }

    /**
     * @return Users|null
     */
    public function getCreatedUserId(): ?Users
    {
        return $this->createdUserId;
    }

    /**
     * @param UserInterface $createdUserId
     * @return CreatedUserIdInterface
     */
    public function setCreatedUserId(UserInterface $createdUserId): CreatedUserIdInterface
    {
        $this->createdUserId = $createdUserId;

        return $this;
    }


}
