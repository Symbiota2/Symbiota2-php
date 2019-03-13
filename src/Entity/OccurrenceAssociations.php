<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * OccurrenceAssociations
 *
 * @ORM\Table(name="omoccurassociations", indexes={@ORM\Index(name="omossococcur_occidassoc_idx", columns={"occidassociate"}), @ORM\Index(name="FK_occurassoc_uidcreated_idx", columns={"createduid"}), @ORM\Index(name="omossococcur_occid_idx", columns={"occid"}), @ORM\Index(name="FK_occurassoc_uidmodified_idx", columns={"modifieduid"}), @ORM\Index(name="INDEX_verbatimSciname", columns={"verbatimsciname"}), @ORM\Index(name="FK_occurassoc_tid_idx", columns={"tid"})})
 * @ORM\Entity(repositoryClass="App\Repository\OccurrenceAssociationsRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class OccurrenceAssociations implements ModifiedUserIdInterface, CreatedUserIdInterface, InitialTimestampInterface, ModifiedTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="associd", type="integer", options={"unsigned"=true})
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
     * @var \App\Entity\Occurrences
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Occurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occidassociate", referencedColumnName="occid")
     * })
     * @Assert\Type(type="integer")
     */
    private $associatedOccurrenceId;

    /**
     * @var string
     *
     * @ORM\Column(name="relationship", type="string", length=150)
     * @Assert\NotBlank()
     * @Assert\Length(max=150)
     */
    private $relationship;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identifier", type="string", length=250, nullable=true, options={"comment"="e.g. GUID"})
     * @Assert\Length(max=250)
     */
    private $identifier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="basisOfRecord", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $basisOfRecord;

    /**
     * @var string|null
     *
     * @ORM\Column(name="resourceurl", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $resourceUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="verbatimsciname", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $verbatimScientificName;

    /**
     * @var \App\Entity\Taxa
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     * })
     * @Assert\Type(type="integer")
     */
    private $taxaId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="locationOnHost", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $locationOnHost;

    /**
     * @var string|null
     *
     * @ORM\Column(name="condition", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $condition;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateEmerged", type="datetime", nullable=true)
     * @Assert\DateTime
     */
    private $dateEmerged;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $dynamicProperties;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $notes;

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
     * @ORM\Column(name="modifiedTimeStamp", type="datetime", nullable=true)
     * @Assert\DateTime
     */
    private $modifiedTimestamp;

    /**
     * @var \App\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modifieduid", referencedColumnName="uid")
     * })
     * @Assert\Type(type="integer")
     */
    private $modifiedUserId;

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

    public function getRelationship(): ?string
    {
        return $this->relationship;
    }

    public function setRelationship(string $relationship): self
    {
        $this->relationship = $relationship;

        return $this;
    }

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    public function setIdentifier(?string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function getBasisOfRecord(): ?string
    {
        return $this->basisOfRecord;
    }

    public function setBasisOfRecord(?string $basisOfRecord): self
    {
        $this->basisOfRecord = $basisOfRecord;

        return $this;
    }

    public function getResourceUrl(): ?string
    {
        return $this->resourceUrl;
    }

    public function setResourceUrl(?string $resourceUrl): self
    {
        $this->resourceUrl = $resourceUrl;

        return $this;
    }

    public function getVerbatimScientificName(): ?string
    {
        return $this->verbatimScientificName;
    }

    public function setVerbatimScientificName(?string $verbatimScientificName): self
    {
        $this->verbatimScientificName = $verbatimScientificName;

        return $this;
    }

    public function getLocationOnHost(): ?string
    {
        return $this->locationOnHost;
    }

    public function setLocationOnHost(?string $locationOnHost): self
    {
        $this->locationOnHost = $locationOnHost;

        return $this;
    }

    public function getCondition(): ?string
    {
        return $this->condition;
    }

    public function setCondition(?string $condition): self
    {
        $this->condition = $condition;

        return $this;
    }

    public function getDateEmerged(): ?\DateTimeInterface
    {
        return $this->dateEmerged;
    }

    public function setDateEmerged(?\DateTimeInterface $dateEmerged): self
    {
        $this->dateEmerged = $dateEmerged;

        return $this;
    }

    public function getDynamicProperties(): ?string
    {
        return $this->dynamicProperties;
    }

    public function setDynamicProperties(?string $dynamicProperties): self
    {
        $this->dynamicProperties = $dynamicProperties;

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

    public function getTaxaId(): ?Taxa
    {
        return $this->taxaId;
    }

    public function setTaxaId(?Taxa $taxaId): self
    {
        $this->taxaId = $taxaId;

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

    public function getAssociatedOccurrenceId(): ?Occurrences
    {
        return $this->associatedOccurrenceId;
    }

    public function setAssociatedOccurrenceId(?Occurrences $associatedOccurrenceId): self
    {
        $this->associatedOccurrenceId = $associatedOccurrenceId;

        return $this;
    }


}
