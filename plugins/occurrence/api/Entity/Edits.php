<?php

namespace Occurrence\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Core\Entity\InitialTimestampInterface;
use Core\Entity\Users;

/**
 * Edits
 *
 * @ORM\Table(name="omoccuredits", uniqueConstraints={@ORM\UniqueConstraint(name="guid_UNIQUE_omoccuredits", columns={"guid"})}, indexes={@ORM\Index(name="fk_omoccuredits_occid", columns={"occid"}), @ORM\Index(name="fk_omoccuredits_uid", columns={"uid"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/occurrence",
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class Edits implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="ocedid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Occurrence\Entity\Occurrences
     *
     * @ORM\ManyToOne(targetEntity="Occurrence\Entity\Occurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid", nullable=false)
     * })
     */
    private $occurrenceId;

    /**
     * @var string
     *
     * @ORM\Column(name="FieldName", type="string", length=45)
     * @Assert\NotBlank()
     * @Assert\Length(max=45)
     */
    private $fieldName;

    /**
     * @var string
     *
     * @ORM\Column(name="FieldValueNew", type="text", length=65535)
     * @Assert\NotBlank()
     * @Assert\Length(max=65535)
     */
    private $fieldValueNew;

    /**
     * @var string
     *
     * @ORM\Column(name="FieldValueOld", type="text", length=65535)
     * @Assert\NotBlank()
     * @Assert\Length(max=65535)
     */
    private $fieldValueOld;

    /**
     * @var int
     *
     * @ORM\Column(name="ReviewStatus", type="integer", options={"default"="1","comment"="1=Open;2=Pending;3=Closed"})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $reviewStatus = 1;

    /**
     * @var int
     *
     * @ORM\Column(name="AppliedStatus", type="integer", options={"comment"="0=Not Applied;1=Applied"})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $appliedStatus;

    /**
     * @var int
     *
     * @ORM\Column(name="editType", type="integer", options={"comment"="0=general edit;1=batch edit"})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $editType = 0;

    /**
     * @var string|null
     *
     * @ORM\Column(name="guid", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $guid;

    /**
     * @var \Core\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="Core\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uid", referencedColumnName="uid", nullable=false)
     * })
     */
    private $userId;

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

    public function getFieldName(): ?string
    {
        return $this->fieldName;
    }

    public function setFieldName(string $fieldName): self
    {
        $this->fieldName = $fieldName;

        return $this;
    }

    public function getFieldValueNew(): ?string
    {
        return $this->fieldValueNew;
    }

    public function setFieldValueNew(string $fieldValueNew): self
    {
        $this->fieldValueNew = $fieldValueNew;

        return $this;
    }

    public function getFieldValueOld(): ?string
    {
        return $this->fieldValueOld;
    }

    public function setFieldValueOld(string $fieldValueOld): self
    {
        $this->fieldValueOld = $fieldValueOld;

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

    public function getAppliedStatus(): ?int
    {
        return $this->appliedStatus;
    }

    public function setAppliedStatus(int $appliedStatus): self
    {
        $this->appliedStatus = $appliedStatus;

        return $this;
    }

    public function getEditType(): ?int
    {
        return $this->editType;
    }

    public function setEditType(int $editType): self
    {
        $this->editType = $editType;

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

    public function getUserId(): ?Users
    {
        return $this->userId;
    }

    public function setUserId(?Users $userId): self
    {
        $this->userId = $userId;

        return $this;
    }


}
