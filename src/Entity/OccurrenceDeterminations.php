<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * OccurrenceDeterminations
 *
 * @ORM\Table(name="omoccurdeterminations", uniqueConstraints={@ORM\UniqueConstraint(name="Index_unique_omoccurdeterminations", columns={"occid", "dateIdentified", "identifiedBy", "sciname"})}, indexes={@ORM\Index(name="FK_omoccurdets_tid", columns={"tid"}), @ORM\Index(name="Index_dateIdentInterpreted", columns={"dateIdentifiedInterpreted"}), @ORM\Index(name="IDX_CA5B5A7F40A24FBA", columns={"occid"})})
 * @ORM\Entity(repositoryClass="App\Repository\OccurrenceDeterminationsRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class OccurrenceDeterminations implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="detid", type="integer", options={"unsigned"=true})
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
     * @var int|null
     *
     * @ORM\Column(name="printqueue", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $printQueue;

    /**
     * @var int|null
     *
     * @ORM\Column(name="appliedStatus", type="integer", nullable=true, options={"default"="1"})
     * @Assert\Type(type="integer")
     */
    private $appliedStatus = 1;

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
     * @ORM\Column(name="identificationRemarks", type="string", length=500, nullable=true)
     * @Assert\Length(max=500)
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

    public function getPrintQueue(): ?int
    {
        return $this->printQueue;
    }

    public function setPrintQueue(?int $printQueue): self
    {
        $this->printQueue = $printQueue;

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

}
