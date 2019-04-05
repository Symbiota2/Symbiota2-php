<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UploadTempDeterminations
 *
 * @ORM\Table(name="uploaddetermtemp", indexes={@ORM\Index(name="Index_uploaddet_dbpk", columns={"dbpk"}), @ORM\Index(name="Index_uploaddet_collid", columns={"collid"}), @ORM\Index(name="Index_uploaddet_occid", columns={"occid"})})
 * @ORM\Entity()
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class UploadTempDeterminations implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="updetid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="occid", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $occurrenceId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="collid", type="integer", options={"unsigned"=true})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $collectionId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dbpk", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     */
    private $sourcePrimaryKey;

    /**
     * @var string
     *
     * @ORM\Column(name="identifiedBy", type="string", length=60)
     * @Assert\NotBlank()
     * @Assert\Length(max=60)
     */
    private $identifiedBy;

    /**
     * @var string
     *
     * @ORM\Column(name="dateIdentified", type="string", length=45)
     * @Assert\NotBlank()
     * @Assert\Length(max=45)
     */
    private $dateIdentified;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateIdentifiedInterpreted", type="date", nullable=true)
     * @Assert\Date
     */
    private $dateIdentifiedInterpreted;

    /**
     * @var string
     *
     * @ORM\Column(name="sciname", type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\Length(max=100)
     */
    private $scientificName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="scientificNameAuthorship", type="string", length=100, nullable=true)
     * @Assert\Length(max=100)
     */
    private $scientificNameAuthorship;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identificationQualifier", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $identificationQualifier;

    /**
     * @var int|null
     *
     * @ORM\Column(name="iscurrent", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $isCurrent;

    /**
     * @var string|null
     *
     * @ORM\Column(name="detType", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $determinationType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identificationReferences", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $identificationReferences;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identificationRemarks", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $identificationRemarks;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sourceIdentifier", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $sourceIdentifier;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortsequence", type="integer", nullable=true, options={"default"="10","unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $sortSequence = 10;

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

    public function getOccurrenceId(): ?int
    {
        return $this->occurrenceId;
    }

    public function setOccurrenceId(?int $occurrenceId): self
    {
        $this->occurrenceId = $occurrenceId;

        return $this;
    }

    public function getCollectionId(): ?int
    {
        return $this->collectionId;
    }

    public function setCollectionId(?int $collectionId): self
    {
        $this->collectionId = $collectionId;

        return $this;
    }

    public function getSourcePrimaryKey(): ?string
    {
        return $this->sourcePrimaryKey;
    }

    public function setSourcePrimaryKey(?string $sourcePrimaryKey): self
    {
        $this->sourcePrimaryKey = $sourcePrimaryKey;

        return $this;
    }

    public function getIdentifiedBy(): ?string
    {
        return $this->identifiedBy;
    }

    public function setIdentifiedBy(string $identifiedBy): self
    {
        $this->identifiedBy = $identifiedBy;

        return $this;
    }

    public function getDateIdentified(): ?string
    {
        return $this->dateIdentified;
    }

    public function setDateIdentified(string $dateIdentified): self
    {
        $this->dateIdentified = $dateIdentified;

        return $this;
    }

    public function getDateIdentifiedInterpreted(): ?\DateTimeInterface
    {
        return $this->dateIdentifiedInterpreted;
    }

    public function setDateIdentifiedInterpreted(?\DateTimeInterface $dateIdentifiedInterpreted): self
    {
        $this->dateIdentifiedInterpreted = $dateIdentifiedInterpreted;

        return $this;
    }

    public function getScientificName(): ?string
    {
        return $this->scientificName;
    }

    public function setScientificName(string $scientificName): self
    {
        $this->scientificName = $scientificName;

        return $this;
    }

    public function getScientificNameAuthorship(): ?string
    {
        return $this->scientificNameAuthorship;
    }

    public function setScientificNameAuthorship(?string $scientificNameAuthorship): self
    {
        $this->scientificNameAuthorship = $scientificNameAuthorship;

        return $this;
    }

    public function getIdentificationQualifier(): ?string
    {
        return $this->identificationQualifier;
    }

    public function setIdentificationQualifier(?string $identificationQualifier): self
    {
        $this->identificationQualifier = $identificationQualifier;

        return $this;
    }

    public function getIsCurrent(): ?int
    {
        return $this->isCurrent;
    }

    public function setIsCurrent(?int $isCurrent): self
    {
        $this->isCurrent = $isCurrent;

        return $this;
    }

    public function getDeterminationType(): ?string
    {
        return $this->determinationType;
    }

    public function setDeterminationType(?string $determinationType): self
    {
        $this->determinationType = $determinationType;

        return $this;
    }

    public function getIdentificationReferences(): ?string
    {
        return $this->identificationReferences;
    }

    public function setIdentificationReferences(?string $identificationReferences): self
    {
        $this->identificationReferences = $identificationReferences;

        return $this;
    }

    public function getIdentificationRemarks(): ?string
    {
        return $this->identificationRemarks;
    }

    public function setIdentificationRemarks(?string $identificationRemarks): self
    {
        $this->identificationRemarks = $identificationRemarks;

        return $this;
    }

    public function getSourceIdentifier(): ?string
    {
        return $this->sourceIdentifier;
    }

    public function setSourceIdentifier(?string $sourceIdentifier): self
    {
        $this->sourceIdentifier = $sourceIdentifier;

        return $this;
    }

    public function getSortSequence(): ?int
    {
        return $this->sortSequence;
    }

    public function setSortSequence(?int $sortSequence): self
    {
        $this->sortSequence = $sortSequence;

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


}
