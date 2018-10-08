<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taxa
 *
 * @ORM\Table(name="taxa", uniqueConstraints={@ORM\UniqueConstraint(name="sciname_unique", columns={"SciName", "RankId", "Author"})}, indexes={@ORM\Index(name="rankid_index", columns={"RankId"}), @ORM\Index(name="unitname1_index", columns={"UnitName1", "UnitName2"}), @ORM\Index(name="FK_taxa_uid_idx", columns={"modifiedUid"}), @ORM\Index(name="sciname_index", columns={"SciName"}), @ORM\Index(name="idx_taxacreated", columns={"InitialTimeStamp"})})
 * @ORM\Entity
 */
class Taxa
{
    /**
     * @var int
     *
     * @ORM\Column(name="tid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="kingdomName", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $kingdomname;

    /**
     * @var int|null
     *
     * @ORM\Column(name="RankId", type="smallint", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $rankid;

    /**
     * @var string
     *
     * @ORM\Column(name="SciName", type="string", length=250, precision=0, scale=0, nullable=false, unique=false)
     */
    private $sciname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitInd1", type="string", length=1, precision=0, scale=0, nullable=true, unique=false)
     */
    private $unitind1;

    /**
     * @var string
     *
     * @ORM\Column(name="UnitName1", type="string", length=50, precision=0, scale=0, nullable=false, unique=false)
     */
    private $unitname1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitInd2", type="string", length=1, precision=0, scale=0, nullable=true, unique=false)
     */
    private $unitind2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitName2", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $unitname2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitInd3", type="string", length=7, precision=0, scale=0, nullable=true, unique=false)
     */
    private $unitind3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnitName3", type="string", length=35, precision=0, scale=0, nullable=true, unique=false)
     */
    private $unitname3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Author", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $author;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="PhyloSortSequence", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $phylosortsequence;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Status", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $status;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Source", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $source;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Hybrid", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $hybrid;

    /**
     * @var int
     *
     * @ORM\Column(name="SecurityStatus", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true,"comment"="0 = no security; 1 = hidden locality"}, unique=false)
     */
    private $securitystatus;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedTimeStamp", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $modifiedtimestamp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\User
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modifiedUid", referencedColumnName="uid", nullable=true)
     * })
     */
    private $modifieduid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Fmdynamicchecklists", mappedBy="tid")
     */
    private $dynclid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Glossary", mappedBy="tid")
     */
    private $glossid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Kmcharacters", mappedBy="tid")
     */
    private $cid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Referenceobject", mappedBy="tid")
     */
    private $refid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Taxauthority", inversedBy="tid")
     * @ORM\JoinTable(name="taxanestedtree",
     *   joinColumns={
     *     @ORM\JoinColumn(name="tid", referencedColumnName="tid", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="taxauthid", referencedColumnName="taxauthid", nullable=true)
     *   }
     * )
     */
    private $taxauthid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Tmtraits", mappedBy="tid")
     */
    private $traitid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entities\Taxstatus", mappedBy="tid")
     */
    private $tsid;

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
        $this->tsid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get tid.
     *
     * @return int
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Set kingdomname.
     *
     * @param string|null $kingdomname
     *
     * @return Taxa
     */
    public function setKingdomname($kingdomname = null)
    {
        $this->kingdomname = $kingdomname;

        return $this;
    }

    /**
     * Get kingdomname.
     *
     * @return string|null
     */
    public function getKingdomname()
    {
        return $this->kingdomname;
    }

    /**
     * Set rankid.
     *
     * @param int|null $rankid
     *
     * @return Taxa
     */
    public function setRankid($rankid = null)
    {
        $this->rankid = $rankid;

        return $this;
    }

    /**
     * Get rankid.
     *
     * @return int|null
     */
    public function getRankid()
    {
        return $this->rankid;
    }

    /**
     * Set sciname.
     *
     * @param string $sciname
     *
     * @return Taxa
     */
    public function setSciname($sciname)
    {
        $this->sciname = $sciname;

        return $this;
    }

    /**
     * Get sciname.
     *
     * @return string
     */
    public function getSciname()
    {
        return $this->sciname;
    }

    /**
     * Set unitind1.
     *
     * @param string|null $unitind1
     *
     * @return Taxa
     */
    public function setUnitind1($unitind1 = null)
    {
        $this->unitind1 = $unitind1;

        return $this;
    }

    /**
     * Get unitind1.
     *
     * @return string|null
     */
    public function getUnitind1()
    {
        return $this->unitind1;
    }

    /**
     * Set unitname1.
     *
     * @param string $unitname1
     *
     * @return Taxa
     */
    public function setUnitname1($unitname1)
    {
        $this->unitname1 = $unitname1;

        return $this;
    }

    /**
     * Get unitname1.
     *
     * @return string
     */
    public function getUnitname1()
    {
        return $this->unitname1;
    }

    /**
     * Set unitind2.
     *
     * @param string|null $unitind2
     *
     * @return Taxa
     */
    public function setUnitind2($unitind2 = null)
    {
        $this->unitind2 = $unitind2;

        return $this;
    }

    /**
     * Get unitind2.
     *
     * @return string|null
     */
    public function getUnitind2()
    {
        return $this->unitind2;
    }

    /**
     * Set unitname2.
     *
     * @param string|null $unitname2
     *
     * @return Taxa
     */
    public function setUnitname2($unitname2 = null)
    {
        $this->unitname2 = $unitname2;

        return $this;
    }

    /**
     * Get unitname2.
     *
     * @return string|null
     */
    public function getUnitname2()
    {
        return $this->unitname2;
    }

    /**
     * Set unitind3.
     *
     * @param string|null $unitind3
     *
     * @return Taxa
     */
    public function setUnitind3($unitind3 = null)
    {
        $this->unitind3 = $unitind3;

        return $this;
    }

    /**
     * Get unitind3.
     *
     * @return string|null
     */
    public function getUnitind3()
    {
        return $this->unitind3;
    }

    /**
     * Set unitname3.
     *
     * @param string|null $unitname3
     *
     * @return Taxa
     */
    public function setUnitname3($unitname3 = null)
    {
        $this->unitname3 = $unitname3;

        return $this;
    }

    /**
     * Get unitname3.
     *
     * @return string|null
     */
    public function getUnitname3()
    {
        return $this->unitname3;
    }

    /**
     * Set author.
     *
     * @param string|null $author
     *
     * @return Taxa
     */
    public function setAuthor($author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author.
     *
     * @return string|null
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set phylosortsequence.
     *
     * @param bool|null $phylosortsequence
     *
     * @return Taxa
     */
    public function setPhylosortsequence($phylosortsequence = null)
    {
        $this->phylosortsequence = $phylosortsequence;

        return $this;
    }

    /**
     * Get phylosortsequence.
     *
     * @return bool|null
     */
    public function getPhylosortsequence()
    {
        return $this->phylosortsequence;
    }

    /**
     * Set status.
     *
     * @param string|null $status
     *
     * @return Taxa
     */
    public function setStatus($status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set source.
     *
     * @param string|null $source
     *
     * @return Taxa
     */
    public function setSource($source = null)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source.
     *
     * @return string|null
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Taxa
     */
    public function setNotes($notes = null)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes.
     *
     * @return string|null
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set hybrid.
     *
     * @param string|null $hybrid
     *
     * @return Taxa
     */
    public function setHybrid($hybrid = null)
    {
        $this->hybrid = $hybrid;

        return $this;
    }

    /**
     * Get hybrid.
     *
     * @return string|null
     */
    public function getHybrid()
    {
        return $this->hybrid;
    }

    /**
     * Set securitystatus.
     *
     * @param int $securitystatus
     *
     * @return Taxa
     */
    public function setSecuritystatus($securitystatus)
    {
        $this->securitystatus = $securitystatus;

        return $this;
    }

    /**
     * Get securitystatus.
     *
     * @return int
     */
    public function getSecuritystatus()
    {
        return $this->securitystatus;
    }

    /**
     * Set modifiedtimestamp.
     *
     * @param \DateTime|null $modifiedtimestamp
     *
     * @return Taxa
     */
    public function setModifiedtimestamp($modifiedtimestamp = null)
    {
        $this->modifiedtimestamp = $modifiedtimestamp;

        return $this;
    }

    /**
     * Get modifiedtimestamp.
     *
     * @return \DateTime|null
     */
    public function getModifiedtimestamp()
    {
        return $this->modifiedtimestamp;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Taxa
     */
    public function setInitialtimestamp($initialtimestamp)
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    /**
     * Get initialtimestamp.
     *
     * @return \DateTime
     */
    public function getInitialtimestamp()
    {
        return $this->initialtimestamp;
    }

    /**
     * Set modifieduid.
     *
     * @param \App\Entities\User|null $modifieduid
     *
     * @return Taxa
     */
    public function setModifieduid(\App\Entities\User $modifieduid = null)
    {
        $this->modifieduid = $modifieduid;

        return $this;
    }

    /**
     * Get modifieduid.
     *
     * @return \App\Entities\User|null
     */
    public function getModifieduid()
    {
        return $this->modifieduid;
    }

    /**
     * Add dynclid.
     *
     * @param \App\Entities\Fmdynamicchecklists $dynclid
     *
     * @return Taxa
     */
    public function addDynclid(\App\Entities\Fmdynamicchecklists $dynclid)
    {
        $this->dynclid[] = $dynclid;

        return $this;
    }

    /**
     * Remove dynclid.
     *
     * @param \App\Entities\Fmdynamicchecklists $dynclid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeDynclid(\App\Entities\Fmdynamicchecklists $dynclid)
    {
        return $this->dynclid->removeElement($dynclid);
    }

    /**
     * Get dynclid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDynclid()
    {
        return $this->dynclid;
    }

    /**
     * Add glossid.
     *
     * @param \App\Entities\Glossary $glossid
     *
     * @return Taxa
     */
    public function addGlossid(\App\Entities\Glossary $glossid)
    {
        $this->glossid[] = $glossid;

        return $this;
    }

    /**
     * Remove glossid.
     *
     * @param \App\Entities\Glossary $glossid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeGlossid(\App\Entities\Glossary $glossid)
    {
        return $this->glossid->removeElement($glossid);
    }

    /**
     * Get glossid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGlossid()
    {
        return $this->glossid;
    }

    /**
     * Add cid.
     *
     * @param \App\Entities\Kmcharacters $cid
     *
     * @return Taxa
     */
    public function addCid(\App\Entities\Kmcharacters $cid)
    {
        $this->cid[] = $cid;

        return $this;
    }

    /**
     * Remove cid.
     *
     * @param \App\Entities\Kmcharacters $cid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCid(\App\Entities\Kmcharacters $cid)
    {
        return $this->cid->removeElement($cid);
    }

    /**
     * Get cid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCid()
    {
        return $this->cid;
    }

    /**
     * Add refid.
     *
     * @param \App\Entities\Referenceobject $refid
     *
     * @return Taxa
     */
    public function addRefid(\App\Entities\Referenceobject $refid)
    {
        $this->refid[] = $refid;

        return $this;
    }

    /**
     * Remove refid.
     *
     * @param \App\Entities\Referenceobject $refid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeRefid(\App\Entities\Referenceobject $refid)
    {
        return $this->refid->removeElement($refid);
    }

    /**
     * Get refid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRefid()
    {
        return $this->refid;
    }

    /**
     * Add taxauthid.
     *
     * @param \App\Entities\Taxauthority $taxauthid
     *
     * @return Taxa
     */
    public function addTaxauthid(\App\Entities\Taxauthority $taxauthid)
    {
        $this->taxauthid[] = $taxauthid;

        return $this;
    }

    /**
     * Remove taxauthid.
     *
     * @param \App\Entities\Taxauthority $taxauthid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTaxauthid(\App\Entities\Taxauthority $taxauthid)
    {
        return $this->taxauthid->removeElement($taxauthid);
    }

    /**
     * Get taxauthid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTaxauthid()
    {
        return $this->taxauthid;
    }

    /**
     * Add traitid.
     *
     * @param \App\Entities\Tmtraits $traitid
     *
     * @return Taxa
     */
    public function addTraitid(\App\Entities\Tmtraits $traitid)
    {
        $this->traitid[] = $traitid;

        return $this;
    }

    /**
     * Remove traitid.
     *
     * @param \App\Entities\Tmtraits $traitid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTraitid(\App\Entities\Tmtraits $traitid)
    {
        return $this->traitid->removeElement($traitid);
    }

    /**
     * Get traitid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTraitid()
    {
        return $this->traitid;
    }

    /**
     * Add tsid.
     *
     * @param \App\Entities\Taxstatus $tsid
     *
     * @return Taxa
     */
    public function addTsid(\App\Entities\Tmtraits $tsid)
    {
        $this->tsid[] = $tsid;

        return $this;
    }

    /**
     * Remove tsid.
     *
     * @param \App\Entities\Taxstatus $tsid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTsid(\App\Entities\Taxstatus $tsid)
    {
        return $this->tsid->removeElement($tsid);
    }

    /**
     * Get tsid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTsid()
    {
        return $this->tsid;
    }
}
