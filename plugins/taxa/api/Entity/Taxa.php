<?php

namespace Taxa\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Core\Entity\ModifiedUserIdInterface;
use Core\Entity\InitialTimestampInterface;
use Core\Entity\ModifiedTimestampInterface;
use Core\Entity\Users;

/**
 * Taxa
 *
 * @ORM\Table(name="taxa", uniqueConstraints={@ORM\UniqueConstraint(name="sciname_unique", columns={"SciName", "RankId", "Author"})}, indexes={@ORM\Index(name="idx_taxacreated", columns={"InitialTimeStamp"}), @ORM\Index(name="FK_taxa_uid_idx", columns={"modifiedUid"}), @ORM\Index(name="unitname1_index_taxa", columns={"UnitName1", "UnitName2"}), @ORM\Index(name="sciname_index_taxa", columns={"SciName"}), @ORM\Index(name="rankid_index", columns={"RankId"})})
 * @ORM\Entity()
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class Taxa implements ModifiedUserIdInterface, InitialTimestampInterface, ModifiedTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="TID", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Taxa\Entity\Ranks
     *
     * @ORM\ManyToOne(targetEntity="Taxa\Entity\Ranks")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="RankId", referencedColumnName="taxonunitid", nullable=false)
     * })
     */
    private $rankId;

    /**
     * @var string
     *
     * @ORM\Column(name="SciName", type="string", length=250)
     * @Assert\NotBlank()
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
     * @var string
     *
     * @ORM\Column(name="UnitName1", type="string", length=50)
     * @Assert\NotBlank()
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
     * @var bool|null
     *
     * @ORM\Column(name="PhyloSortSequence", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $phylogenySortSequence;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Status", type="string", length=50, nullable=true)
     * @Assert\Length(max=50)
     */
    private $status;

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
     * @ORM\Column(name="Hybrid", type="string", length=50, nullable=true)
     * @Assert\Length(max=50)
     */
    private $hybrid;

    /**
     * @var int
     *
     * @ORM\Column(name="SecurityStatus", type="integer", options={"unsigned"=true,"default"="0","comment"="0 = no security; 1 = hidden locality"})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $securityStatus = 0;

    /**
     * @var \Core\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="Core\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modifiedUid", referencedColumnName="uid")
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
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Taxa\Entity\Authorities", inversedBy="taxaId")
     * @ORM\JoinTable(name="taxanestedtree",
     *   joinColumns={
     *     @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="taxauthid", referencedColumnName="taxauthid")
     *   }
     * )
     */
    private $taxaAuthorityId;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->taxaAuthorityId = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRankId(): ?Ranks
    {
        return $this->rankId;
    }

    public function setRankId(?Ranks $rankId): self
    {
        $this->rankId = $rankId;

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

    public function setUnitName1(string $unitName1): self
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

    public function getPhylogenySortSequence(): ?int
    {
        return $this->phylogenySortSequence;
    }

    public function setPhylogenySortSequence(?int $phylogenySortSequence): self
    {
        $this->phylogenySortSequence = $phylogenySortSequence;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

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

    public function getHybrid(): ?string
    {
        return $this->hybrid;
    }

    public function setHybrid(?string $hybrid): self
    {
        $this->hybrid = $hybrid;

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

    /**
     * @return Collection|Authorities[]
     */
    public function getTaxaAuthorityId(): Collection
    {
        return $this->taxaAuthorityId;
    }

    public function addTaxaAuthorityId(Authorities $taxaAuthorityId): self
    {
        if (!$this->taxaAuthorityId->contains($taxaAuthorityId)) {
            $this->taxaAuthorityId[] = $taxaAuthorityId;
        }

        return $this;
    }

    public function removeTaxaAuthorityId(Authorities $taxaAuthorityId): self
    {
        if ($this->taxaAuthorityId->contains($taxaAuthorityId)) {
            $this->taxaAuthorityId->removeElement($taxaAuthorityId);
        }

        return $this;
    }

}
