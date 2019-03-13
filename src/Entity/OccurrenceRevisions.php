<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * OccurrenceRevisions
 *
 * @ORM\Table(name="omoccurrevisions", uniqueConstraints={@ORM\UniqueConstraint(name="guid_UNIQUE_omoccurrevisions", columns={"guid"})}, indexes={@ORM\Index(name="fk_omrevisions_uid_idx", columns={"createduid"}), @ORM\Index(name="Index_omrevisions_reviewed", columns={"reviewStatus"}), @ORM\Index(name="fk_omrevisions_occid_idx", columns={"occid"}), @ORM\Index(name="Index_omrevisions_applied", columns={"appliedStatus"}), @ORM\Index(name="Index_omrevisions_editor", columns={"externalEditor"}), @ORM\Index(name="Index_omrevisions_source", columns={"externalSource"})})
 * @ORM\Entity(repositoryClass="App\Repository\OccurrenceRevisionsRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class OccurrenceRevisions implements CreatedUserIdInterface, InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="orid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\Entity\Occurrences
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Occurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     * })
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $occurrenceId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="oldValues", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $oldValues;

    /**
     * @var string|null
     *
     * @ORM\Column(name="newValues", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $newValues;

    /**
     * @var string|null
     *
     * @ORM\Column(name="externalSource", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $externalSource;

    /**
     * @var string|null
     *
     * @ORM\Column(name="externalEditor", type="string", length=100, nullable=true)
     * @Assert\Length(max=100)
     */
    private $externalEditor;

    /**
     * @var string|null
     *
     * @ORM\Column(name="guid", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $guid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="reviewStatus", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $reviewStatus;

    /**
     * @var int|null
     *
     * @ORM\Column(name="appliedStatus", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $appliedStatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="errorMessage", type="string", length=500, nullable=true)
     * @Assert\Length(max=500)
     */
    private $errorMessage;

    /**
     * @var \App\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="createduid", referencedColumnName="uid")
     * })
     * @Assert\Type(type="integer")
     */
    private $createdUserId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="externalTimestamp", type="datetime", nullable=true)
     * @Assert\DateTime
     */
    private $externalTimestamp;

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

    public function getOldValues(): ?string
    {
        return $this->oldValues;
    }

    public function setOldValues(?string $oldValues): self
    {
        $this->oldValues = $oldValues;

        return $this;
    }

    public function getNewValues(): ?string
    {
        return $this->newValues;
    }

    public function setNewValues(?string $newValues): self
    {
        $this->newValues = $newValues;

        return $this;
    }

    public function getExternalSource(): ?string
    {
        return $this->externalSource;
    }

    public function setExternalSource(?string $externalSource): self
    {
        $this->externalSource = $externalSource;

        return $this;
    }

    public function getExternalEditor(): ?string
    {
        return $this->externalEditor;
    }

    public function setExternalEditor(?string $externalEditor): self
    {
        $this->externalEditor = $externalEditor;

        return $this;
    }

    public function getGuid(): ?string
    {
        return $this->guid;
    }

    public function setGuid(?string $guid): self
    {
        $this->guid = $guid;

        return $this;
    }

    public function getReviewStatus(): ?int
    {
        return $this->reviewStatus;
    }

    public function setReviewStatus(?int $reviewStatus): self
    {
        $this->reviewStatus = $reviewStatus;

        return $this;
    }

    public function getAppliedStatus(): ?int
    {
        return $this->appliedStatus;
    }

    public function setAppliedStatus(?int $appliedStatus): self
    {
        $this->appliedStatus = $appliedStatus;

        return $this;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    public function setErrorMessage(?string $errorMessage): self
    {
        $this->errorMessage = $errorMessage;

        return $this;
    }

    public function getExternalTimestamp(): ?\DateTimeInterface
    {
        return $this->externalTimestamp;
    }

    public function setExternalTimestamp(?\DateTimeInterface $externalTimestamp): self
    {
        $this->externalTimestamp = $externalTimestamp;

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
