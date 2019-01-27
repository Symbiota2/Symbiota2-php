<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Taxa
 *
 * @ORM\Table(name="taxa", uniqueConstraints={@ORM\UniqueConstraint(name="sciname_unique", columns={"SciName", "RankId", "Author"})}, indexes={@ORM\Index(name="idx_taxacreated", columns={"InitialTimeStamp"}), @ORM\Index(name="FK_taxa_uid_idx", columns={"modifiedUid"}), @ORM\Index(name="unitname1_index_taxa", columns={"UnitName1", "UnitName2"}), @ORM\Index(name="sciname_index_taxa", columns={"SciName"}), @ORM\Index(name="rankid_index", columns={"RankId"})})
 * @ORM\Entity(repositoryClass="App\Repository\TaxaRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 *
 */
class Taxa
{
    /**
     * @var int
     *
     * @ORM\Column(name="TID", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="RankId", type="smallint", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $rankid = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="SciName", type="string", length=250, nullable=false)
     */
    private $sciname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitInd1", type="string", length=1, nullable=true, options={"default"=NULL})
     */
    private $unitind1 = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="UnitName1", type="string", length=50, nullable=false)
     */
    private $unitname1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitInd2", type="string", length=1, nullable=true, options={"default"=NULL})
     */
    private $unitind2 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitName2", type="string", length=50, nullable=true, options={"default"=NULL})
     */
    private $unitname2 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitInd3", type="string", length=7, nullable=true, options={"default"=NULL})
     */
    private $unitind3 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitName3", type="string", length=35, nullable=true, options={"default"=NULL})
     */
    private $unitname3 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Author", type="string", length=100, nullable=true, options={"default"=NULL})
     */
    private $author = 'NULL';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="PhyloSortSequence", type="boolean", nullable=true, options={"default"=NULL})
     */
    private $phylosortsequence = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Status", type="string", length=50, nullable=true, options={"default"=NULL})
     */
    private $status = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Source", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $source = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Hybrid", type="string", length=50, nullable=true, options={"default"=NULL})
     */
    private $hybrid = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="SecurityStatus", type="integer", nullable=false, options={"unsigned"=true,"default"="0","comment"="0 = no security; 1 = hidden locality"})
     */
    private $securitystatus = '0';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedTimeStamp", type="datetime", nullable=true, options={"default"=NULL})
     */
    private $modifiedtimestamp = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modifiedUid", referencedColumnName="uid")
     * })
     */
    private $modifieduid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Fmdynamicchecklists", mappedBy="tid")
     */
    private $dynclid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Glossary", mappedBy="tid")
     */
    private $glossid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Kmcharacters", inversedBy="tid")
     * @ORM\JoinTable(name="kmchartaxalink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="CID", referencedColumnName="cid")
     *   }
     * )
     */
    private $cid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Referenceobject", mappedBy="tid")
     */
    private $refid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Taxauthority", inversedBy="tid")
     * @ORM\JoinTable(name="taxanestedtree",
     *   joinColumns={
     *     @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="taxauthid", referencedColumnName="taxauthid")
     *   }
     * )
     */
    private $taxauthid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Tmtraits", mappedBy="tid")
     */
    private $traitid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dynclid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->glossid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->refid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->taxauthid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->traitid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getTid(): ?int
    {
        return $this->tid;
    }

    public function getRankid(): ?int
    {
        return $this->rankid;
    }

    public function setRankid(?int $rankid): self
    {
        $this->rankid = $rankid;

        return $this;
    }

    public function getSciname(): ?string
    {
        return $this->sciname;
    }

    public function setSciname(string $sciname): self
    {
        $this->sciname = $sciname;

        return $this;
    }

    public function getUnitind1(): ?string
    {
        return $this->unitind1;
    }

    public function setUnitind1(?string $unitind1): self
    {
        $this->unitind1 = $unitind1;

        return $this;
    }

    public function getUnitname1(): ?string
    {
        return $this->unitname1;
    }

    public function setUnitname1(string $unitname1): self
    {
        $this->unitname1 = $unitname1;

        return $this;
    }

    public function getUnitind2(): ?string
    {
        return $this->unitind2;
    }

    public function setUnitind2(?string $unitind2): self
    {
        $this->unitind2 = $unitind2;

        return $this;
    }

    public function getUnitname2(): ?string
    {
        return $this->unitname2;
    }

    public function setUnitname2(?string $unitname2): self
    {
        $this->unitname2 = $unitname2;

        return $this;
    }

    public function getUnitind3(): ?string
    {
        return $this->unitind3;
    }

    public function setUnitind3(?string $unitind3): self
    {
        $this->unitind3 = $unitind3;

        return $this;
    }

    public function getUnitname3(): ?string
    {
        return $this->unitname3;
    }

    public function setUnitname3(?string $unitname3): self
    {
        $this->unitname3 = $unitname3;

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

    public function getPhylosortsequence(): ?bool
    {
        return $this->phylosortsequence;
    }

    public function setPhylosortsequence(?bool $phylosortsequence): self
    {
        $this->phylosortsequence = $phylosortsequence;

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

    public function getSecuritystatus(): ?int
    {
        return $this->securitystatus;
    }

    public function setSecuritystatus(int $securitystatus): self
    {
        $this->securitystatus = $securitystatus;

        return $this;
    }

    public function getModifiedtimestamp(): ?\DateTimeInterface
    {
        return $this->modifiedtimestamp;
    }

    public function setModifiedtimestamp(?\DateTimeInterface $modifiedtimestamp): self
    {
        $this->modifiedtimestamp = $modifiedtimestamp;

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

    public function getModifieduid(): ?Users
    {
        return $this->modifieduid;
    }

    public function setModifieduid(?Users $modifieduid): self
    {
        $this->modifieduid = $modifieduid;

        return $this;
    }

    /**
     * @return Collection|Fmdynamicchecklists[]
     */
    public function getDynclid(): Collection
    {
        return $this->dynclid;
    }

    public function addDynclid(Fmdynamicchecklists $dynclid): self
    {
        if (!$this->dynclid->contains($dynclid)) {
            $this->dynclid[] = $dynclid;
            $dynclid->addTid($this);
        }

        return $this;
    }

    public function removeDynclid(Fmdynamicchecklists $dynclid): self
    {
        if ($this->dynclid->contains($dynclid)) {
            $this->dynclid->removeElement($dynclid);
            $dynclid->removeTid($this);
        }

        return $this;
    }

    /**
     * @return Collection|Glossary[]
     */
    public function getGlossid(): Collection
    {
        return $this->glossid;
    }

    public function addGlossid(Glossary $glossid): self
    {
        if (!$this->glossid->contains($glossid)) {
            $this->glossid[] = $glossid;
            $glossid->addTid($this);
        }

        return $this;
    }

    public function removeGlossid(Glossary $glossid): self
    {
        if ($this->glossid->contains($glossid)) {
            $this->glossid->removeElement($glossid);
            $glossid->removeTid($this);
        }

        return $this;
    }

    /**
     * @return Collection|Kmcharacters[]
     */
    public function getCid(): Collection
    {
        return $this->cid;
    }

    public function addCid(Kmcharacters $cid): self
    {
        if (!$this->cid->contains($cid)) {
            $this->cid[] = $cid;
        }

        return $this;
    }

    public function removeCid(Kmcharacters $cid): self
    {
        if ($this->cid->contains($cid)) {
            $this->cid->removeElement($cid);
        }

        return $this;
    }

    /**
     * @return Collection|Referenceobject[]
     */
    public function getRefid(): Collection
    {
        return $this->refid;
    }

    public function addRefid(Referenceobject $refid): self
    {
        if (!$this->refid->contains($refid)) {
            $this->refid[] = $refid;
            $refid->addTid($this);
        }

        return $this;
    }

    public function removeRefid(Referenceobject $refid): self
    {
        if ($this->refid->contains($refid)) {
            $this->refid->removeElement($refid);
            $refid->removeTid($this);
        }

        return $this;
    }

    /**
     * @return Collection|Taxauthority[]
     */
    public function getTaxauthid(): Collection
    {
        return $this->taxauthid;
    }

    public function addTaxauthid(Taxauthority $taxauthid): self
    {
        if (!$this->taxauthid->contains($taxauthid)) {
            $this->taxauthid[] = $taxauthid;
        }

        return $this;
    }

    public function removeTaxauthid(Taxauthority $taxauthid): self
    {
        if ($this->taxauthid->contains($taxauthid)) {
            $this->taxauthid->removeElement($taxauthid);
        }

        return $this;
    }

    /**
     * @return Collection|Tmtraits[]
     */
    public function getTraitid(): Collection
    {
        return $this->traitid;
    }

    public function addTraitid(Tmtraits $traitid): self
    {
        if (!$this->traitid->contains($traitid)) {
            $this->traitid[] = $traitid;
            $traitid->addTid($this);
        }

        return $this;
    }

    public function removeTraitid(Tmtraits $traitid): self
    {
        if ($this->traitid->contains($traitid)) {
            $this->traitid->removeElement($traitid);
            $traitid->removeTid($this);
        }

        return $this;
    }

}
