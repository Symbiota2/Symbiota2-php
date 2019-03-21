<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UploadTempTaxa
 *
 * @ORM\Table(name="uploadtaxa", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQUE_sciname", columns={"SciName", "RankId", "Author", "AcceptedStr"})}, indexes={@ORM\Index(name="sciname_index_uploadtaxa", columns={"SciName"}), @ORM\Index(name="acceptedStr_index", columns={"AcceptedStr"}), @ORM\Index(name="sourceAcceptedId_index", columns={"SourceAcceptedId"}), @ORM\Index(name="acceptance_index", columns={"Acceptance"}), @ORM\Index(name="parentStr_index", columns={"ParentStr"}), @ORM\Index(name="sourceID_index", columns={"SourceId"}), @ORM\Index(name="sourceParentId_index", columns={"SourceParentId"}), @ORM\Index(name="scinameinput_index", columns={"scinameinput"}), @ORM\Index(name="unitname1_index_uploadtaxa", columns={"UnitName1"})})
 * @ORM\Entity(repositoryClass="App\Repository\UploadTempTaxaRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class UploadTempTaxa implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="uptid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="TID", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $taxaId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="SourceId", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $sourceId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Family", type="string", length=50, nullable=true)
     * @Assert\Length(max=50)
     */
    private $family;

    /**
     * @var int|null
     *
     * @ORM\Column(name="RankId", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $rankId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="RankName", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $rankName;

    /**
     * @var string
     *
     * @ORM\Column(name="scinameinput", type="string", length=250)
     * @Assert\NotBlank()
     * @Assert\Length(max=250)
     */
    private $scientificNameInput;

    /**
     * @var string|null
     *
     * @ORM\Column(name="SciName", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $scientificName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitInd1", type="string", length=1, nullable=true)
     * @Assert\Length(max=1)
     */
    private $unitIndicator1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitName1", type="string", length=50, nullable=true)
     * @Assert\Length(max=50)
     */
    private $unitName1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitInd2", type="string", length=1, nullable=true)
     * @Assert\Length(max=1)
     */
    private $unitIndicator2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitName2", type="string", length=50, nullable=true)
     * @Assert\Length(max=50)
     */
    private $unitName2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitInd3", type="string", length=7, nullable=true)
     * @Assert\Length(max=7)
     */
    private $unitIndicator3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitName3", type="string", length=35, nullable=true)
     * @Assert\Length(max=35)
     */
    private $unitName3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Author", type="string", length=100, nullable=true)
     * @Assert\Length(max=100)
     */
    private $author;

    /**
     * @var string|null
     *
     * @ORM\Column(name="InfraAuthor", type="string", length=100, nullable=true)
     * @Assert\Length(max=100)
     */
    private $infraspecificAuthor;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Acceptance", type="integer", nullable=true, options={"default"="1","unsigned"=true,"comment"="0 = not accepted; 1 = accepted"})
     * @Assert\Type(type="integer")
     */
    private $acceptance = 1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="AcceptedStr", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $acceptedScientificName;

    /**
     * @var int|null
     *
     * @ORM\Column(name="SourceAcceptedId", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $sourceAcceptedId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnacceptabilityReason", type="string", length=24, nullable=true)
     * @Assert\Length(max=24)
     */
    private $unacceptabilityReason;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ParentTid", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $parentTaxaId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ParentStr", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $parentScientificName;

    /**
     * @var int|null
     *
     * @ORM\Column(name="SourceParentId", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $sourceParentId;

    /**
     * @var int
     *
     * @ORM\Column(name="SecurityStatus", type="integer", options={"unsigned"=true,"comment"="0 = no security; 1 = hidden locality"})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $securityStatus = 0;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Source", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $source;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Notes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="vernacular", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $vernacularName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="vernlang", type="string", length=15, nullable=true)
     * @Assert\Length(max=15)
     */
    private $vernacularNameLanguage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Hybrid", type="string", length=50, nullable=true)
     * @Assert\Length(max=50)
     */
    private $hybrid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ErrorStatus", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     */
    private $errorStatus;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime")
     */
    private $initialTimestamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTaxaId(): ?Taxa
    {
        return $this->taxaId;
    }

    public function setTaxaId(?int $taxaId): self
    {
        $this->taxaId = $taxaId;

        return $this;
    }

    public function getSourceId(): ?int
    {
        return $this->sourceId;
    }

    public function setSourceId(?int $sourceId): self
    {
        $this->sourceId = $sourceId;

        return $this;
    }

    public function getFamily(): ?string
    {
        return $this->family;
    }

    public function setFamily(?string $family): self
    {
        $this->family = $family;

        return $this;
    }

    public function getRankId(): ?int
    {
        return $this->rankId;
    }

    public function setRankId(?int $rankId): self
    {
        $this->rankId = $rankId;

        return $this;
    }

    public function getRankName(): ?string
    {
        return $this->rankName;
    }

    public function setRankName(?string $rankName): self
    {
        $this->rankName = $rankName;

        return $this;
    }

    public function getScientificNameInput(): ?string
    {
        return $this->scientificNameInput;
    }

    public function setScientificNameInput(string $scientificNameInput): self
    {
        $this->scientificNameInput = $scientificNameInput;

        return $this;
    }

    public function getScientificName(): ?string
    {
        return $this->scientificName;
    }

    public function setScientificName(?string $scientificName): self
    {
        $this->scientificName = $scientificName;

        return $this;
    }

    public function getUnitIndicator1(): ?string
    {
        return $this->unitIndicator1;
    }

    public function setUnitIndicator1(?string $unitIndicator1): self
    {
        $this->unitIndicator1 = $unitIndicator1;

        return $this;
    }

    public function getUnitName1(): ?string
    {
        return $this->unitName1;
    }

    public function setUnitName1(?string $unitName1): self
    {
        $this->unitName1 = $unitName1;

        return $this;
    }

    public function getUnitIndicator2(): ?string
    {
        return $this->unitIndicator2;
    }

    public function setUnitIndicator2(?string $unitIndicator2): self
    {
        $this->unitIndicator2 = $unitIndicator2;

        return $this;
    }

    public function getUnitName2(): ?string
    {
        return $this->unitName2;
    }

    public function setUnitName2(?string $unitName2): self
    {
        $this->unitName2 = $unitName2;

        return $this;
    }

    public function getUnitIndicator3(): ?string
    {
        return $this->unitIndicator3;
    }

    public function setUnitIndicator3(?string $unitIndicator3): self
    {
        $this->unitIndicator3 = $unitIndicator3;

        return $this;
    }

    public function getUnitName3(): ?string
    {
        return $this->unitName3;
    }

    public function setUnitName3(?string $unitName3): self
    {
        $this->unitName3 = $unitName3;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getInfraspecificAuthor(): ?string
    {
        return $this->infraspecificAuthor;
    }

    public function setInfraspecificAuthor(?string $infraspecificAuthor): self
    {
        $this->infraspecificAuthor = $infraspecificAuthor;

        return $this;
    }

    public function getAcceptance(): ?int
    {
        return $this->acceptance;
    }

    public function setAcceptance(?int $acceptance): self
    {
        $this->acceptance = $acceptance;

        return $this;
    }

    public function getAcceptedScientificName(): ?string
    {
        return $this->acceptedScientificName;
    }

    public function setAcceptedScientificName(?string $acceptedScientificName): self
    {
        $this->acceptedScientificName = $acceptedScientificName;

        return $this;
    }

    public function getSourceAcceptedId(): ?int
    {
        return $this->sourceAcceptedId;
    }

    public function setSourceAcceptedId(?int $sourceAcceptedId): self
    {
        $this->sourceAcceptedId = $sourceAcceptedId;

        return $this;
    }

    public function getUnacceptabilityReason(): ?string
    {
        return $this->unacceptabilityReason;
    }

    public function setUnacceptabilityReason(?string $unacceptabilityReason): self
    {
        $this->unacceptabilityReason = $unacceptabilityReason;

        return $this;
    }

    public function getParentTaxaId(): ?int
    {
        return $this->parentTaxaId;
    }

    public function setParentTaxaId(?int $parentTaxaId): self
    {
        $this->parentTaxaId = $parentTaxaId;

        return $this;
    }

    public function getParentScientificName(): ?string
    {
        return $this->parentScientificName;
    }

    public function setParentScientificName(?string $parentScientificName): self
    {
        $this->parentScientificName = $parentScientificName;

        return $this;
    }

    public function getSourceParentId(): ?int
    {
        return $this->sourceParentId;
    }

    public function setSourceParentId(?int $sourceParentId): self
    {
        $this->sourceParentId = $sourceParentId;

        return $this;
    }

    public function getSecurityStatus(): ?int
    {
        return $this->securityStatus;
    }

    public function setSecurityStatus(int $securityStatus): self
    {
        $this->securityStatus = $securityStatus;

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

    public function getVernacularName(): ?string
    {
        return $this->vernacularName;
    }

    public function setVernacularName(?string $vernacularName): self
    {
        $this->vernacularName = $vernacularName;

        return $this;
    }

    public function getVernacularNameLanguage(): ?string
    {
        return $this->vernacularNameLanguage;
    }

    public function setVernacularNameLanguage(?string $vernacularNameLanguage): self
    {
        $this->vernacularNameLanguage = $vernacularNameLanguage;

        return $this;
    }

    public function getHybrid(): ?string
    {
        return $this->hybrid;
    }

    public function setHybrid(?string $hybrid): self
    {
        $this->hybrid = $hybrid;

        return $this;
    }

    public function getErrorStatus(): ?string
    {
        return $this->errorStatus;
    }

    public function setErrorStatus(?string $errorStatus): self
    {
        $this->errorStatus = $errorStatus;

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
