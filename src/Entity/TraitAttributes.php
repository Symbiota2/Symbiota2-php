<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TraitAttributes
 *
 * @ORM\Table(name="tmattributes", indexes={@ORM\Index(name="FK_tmattr_occid_idx", columns={"occid"}), @ORM\Index(name="FK_tmattr_uidmodified_idx", columns={"modifieduid"}), @ORM\Index(name="FK_tmattr_stateid_idx", columns={"stateid"}), @ORM\Index(name="FK_attr_uidcreate_idx", columns={"createduid"}), @ORM\Index(name="FK_tmattr_imgid_idx", columns={"imgid"})})
 * @ORM\Entity(repositoryClass="App\Repository\TraitAttributesRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class TraitAttributes implements ModifiedUserIdInterface, CreatedUserIdInterface, InitialTimestampInterface, ModifiedTimestampInterface
{
    /**
     * @var \App\Entity\TraitStates
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="\App\Entity\TraitStates")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stateid", referencedColumnName="stateid", nullable=false)
     * })
     */
    private $stateId;

    /**
     * @var \App\Entity\Occurrences
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="\App\Entity\Occurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid", nullable=false)
     * })
     */
    private $occurrenceId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="modifier", type="string", length=100, nullable=true)
     * @Assert\Length(max=100)
     */
    private $modifier;

    /**
     * @var float|null
     *
     * @ORM\Column(name="xvalue", type="float", precision=15, scale=5, nullable=true)
     * @Assert\Type(type="float")
     */
    private $xValue;

    /**
     * @var \App\Entity\Images
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Images")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="imgid", referencedColumnName="imgid")
     * })
     */
    private $imageId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagecoordinates", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $imageCoordinates;

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $source;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $notes;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="statuscode", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $statusCode;

    /**
     * @var \App\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modifieduid", referencedColumnName="uid")
     * })
     */
    private $modifiedUserId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedTimeStamp", type="datetime", nullable=true)
     * @Assert\DateTime
     */
    private $modifiedTimestamp;

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
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=true)
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getModifier(): ?string
    {
        return $this->modifier;
    }

    public function setModifier(?string $modifier): self
    {
        $this->modifier = $modifier;

        return $this;
    }

    public function getXValue(): ?float
    {
        return $this->xValue;
    }

    public function setXValue(?float $xValue): self
    {
        $this->xValue = $xValue;

        return $this;
    }

    public function getImageCoordinates(): ?string
    {
        return $this->imageCoordinates;
    }

    public function setImageCoordinates(?string $imageCoordinates): self
    {
        $this->imageCoordinates = $imageCoordinates;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

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

    public function getStatusCode(): ?bool
    {
        return $this->statusCode;
    }

    public function setStatusCode(?bool $statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function getModifiedTimestamp(): ?\DateTimeInterface
    {
        return $this->modifiedTimestamp;
    }

    public function setModifiedTimestamp(?\DateTimeInterface $modifiedTimestamp): ModifiedTimestampInterface
    {
        $this->modifiedTimestamp = $modifiedTimestamp;

        return $this;
    }

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(?\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }

    public function getStateId(): ?TraitStates
    {
        return $this->stateId;
    }

    public function setStateId(?TraitStates $stateId): self
    {
        $this->stateId = $stateId;

        return $this;
    }

    public function getImageId(): ?Images
    {
        return $this->imageId;
    }

    public function setImageId(?Images $imageId): self
    {
        $this->imageId = $imageId;

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

    /**
     * @return Users|null
     */
    public function getModifiedUserId(): ?Users
    {
        return $this->modifiedUserId;
    }

    /**
     * @param UserInterface $modifiedUserId
     * @return ModifiedUserIdInterface
     */
    public function setModifiedUserId(UserInterface $modifiedUserId): ModifiedUserIdInterface
    {
        $this->modifiedUserId = $modifiedUserId;

        return $this;
    }


}
