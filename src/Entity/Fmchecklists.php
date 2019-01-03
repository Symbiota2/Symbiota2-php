<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Fmchecklists
 *
 * @ORM\Table(name="fmchecklists", indexes={@ORM\Index(name="FK_checklists_uid", columns={"uid"}), @ORM\Index(name="name", columns={"Name", "Type"})})
 * @ORM\Entity(repositoryClass="App\Repository\FmchecklistsRepository")
 */
class Fmchecklists
{
    /**
     * @var int
     *
     * @ORM\Column(name="CLID", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $clid;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Title", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $title = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Locality", type="string", length=500, nullable=true, options={"default"=NULL})
     */
    private $locality = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Publication", type="string", length=500, nullable=true, options={"default"=NULL})
     */
    private $publication = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Abstract", type="text", length=65535, nullable=true, options={"default"=NULL})
     */
    private $abstract = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Authors", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $authors = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Type", type="string", length=50, nullable=true, options={"default"="static"})
     */
    private $type = 'static';

    /**
     * @var string|null
     *
     * @ORM\Column(name="politicalDivision", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $politicaldivision = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicsql", type="string", length=500, nullable=true, options={"default"=NULL})
     */
    private $dynamicsql = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Parent", type="string", length=50, nullable=true, options={"default"=NULL})
     */
    private $parent = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="parentclid", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $parentclid = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Notes", type="string", length=500, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var float|null
     *
     * @ORM\Column(name="LatCentroid", type="float", precision=9, scale=6, nullable=true, options={"default"=NULL})
     */
    private $latcentroid = 'NULL';

    /**
     * @var float|null
     *
     * @ORM\Column(name="LongCentroid", type="float", precision=9, scale=6, nullable=true, options={"default"=NULL})
     */
    private $longcentroid = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="pointradiusmeters", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $pointradiusmeters = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="footprintWKT", type="text", length=65535, nullable=true, options={"default"=NULL})
     */
    private $footprintwkt = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="percenteffort", type="integer", nullable=true, options={"default"=NULL})
     */
    private $percenteffort = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Access", type="string", length=45, nullable=true, options={"default"="private"})
     */
    private $access = 'private';

    /**
     * @var string|null
     *
     * @ORM\Column(name="defaultSettings", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $defaultsettings = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="iconUrl", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $iconurl = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="headerUrl", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $headerurl = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="SortSequence", type="integer", nullable=false, options={"default"="50","unsigned"=true})
     */
    private $sortsequence = '50';

    /**
     * @var int|null
     *
     * @ORM\Column(name="expiration", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $expiration = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DateLastModified", type="datetime", nullable=true, options={"default"=NULL})
     */
    private $datelastmodified = 'NULL';

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
     *   @ORM\JoinColumn(name="uid", referencedColumnName="uid")
     * })
     */
    private $uid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Fmprojects", mappedBy="clid")
     */
    private $pid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Referenceobject", mappedBy="clid")
     */
    private $refid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->refid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getClid(): ?int
    {
        return $this->clid;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getLocality(): ?string
    {
        return $this->locality;
    }

    public function setLocality(?string $locality): self
    {
        $this->locality = $locality;

        return $this;
    }

    public function getPublication(): ?string
    {
        return $this->publication;
    }

    public function setPublication(?string $publication): self
    {
        $this->publication = $publication;

        return $this;
    }

    public function getAbstract(): ?string
    {
        return $this->abstract;
    }

    public function setAbstract(?string $abstract): self
    {
        $this->abstract = $abstract;

        return $this;
    }

    public function getAuthors(): ?string
    {
        return $this->authors;
    }

    public function setAuthors(?string $authors): self
    {
        $this->authors = $authors;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPoliticaldivision(): ?string
    {
        return $this->politicaldivision;
    }

    public function setPoliticaldivision(?string $politicaldivision): self
    {
        $this->politicaldivision = $politicaldivision;

        return $this;
    }

    public function getDynamicsql(): ?string
    {
        return $this->dynamicsql;
    }

    public function setDynamicsql(?string $dynamicsql): self
    {
        $this->dynamicsql = $dynamicsql;

        return $this;
    }

    public function getParent(): ?string
    {
        return $this->parent;
    }

    public function setParent(?string $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function getParentclid(): ?int
    {
        return $this->parentclid;
    }

    public function setParentclid(?int $parentclid): self
    {
        $this->parentclid = $parentclid;

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

    public function getLatcentroid(): ?float
    {
        return $this->latcentroid;
    }

    public function setLatcentroid(?float $latcentroid): self
    {
        $this->latcentroid = $latcentroid;

        return $this;
    }

    public function getLongcentroid(): ?float
    {
        return $this->longcentroid;
    }

    public function setLongcentroid(?float $longcentroid): self
    {
        $this->longcentroid = $longcentroid;

        return $this;
    }

    public function getPointradiusmeters(): ?int
    {
        return $this->pointradiusmeters;
    }

    public function setPointradiusmeters(?int $pointradiusmeters): self
    {
        $this->pointradiusmeters = $pointradiusmeters;

        return $this;
    }

    public function getFootprintwkt(): ?string
    {
        return $this->footprintwkt;
    }

    public function setFootprintwkt(?string $footprintwkt): self
    {
        $this->footprintwkt = $footprintwkt;

        return $this;
    }

    public function getPercenteffort(): ?int
    {
        return $this->percenteffort;
    }

    public function setPercenteffort(?int $percenteffort): self
    {
        $this->percenteffort = $percenteffort;

        return $this;
    }

    public function getAccess(): ?string
    {
        return $this->access;
    }

    public function setAccess(?string $access): self
    {
        $this->access = $access;

        return $this;
    }

    public function getDefaultsettings(): ?string
    {
        return $this->defaultsettings;
    }

    public function setDefaultsettings(?string $defaultsettings): self
    {
        $this->defaultsettings = $defaultsettings;

        return $this;
    }

    public function getIconurl(): ?string
    {
        return $this->iconurl;
    }

    public function setIconurl(?string $iconurl): self
    {
        $this->iconurl = $iconurl;

        return $this;
    }

    public function getHeaderurl(): ?string
    {
        return $this->headerurl;
    }

    public function setHeaderurl(?string $headerurl): self
    {
        $this->headerurl = $headerurl;

        return $this;
    }

    public function getSortsequence(): ?int
    {
        return $this->sortsequence;
    }

    public function setSortsequence(int $sortsequence): self
    {
        $this->sortsequence = $sortsequence;

        return $this;
    }

    public function getExpiration(): ?int
    {
        return $this->expiration;
    }

    public function setExpiration(?int $expiration): self
    {
        $this->expiration = $expiration;

        return $this;
    }

    public function getDatelastmodified(): ?\DateTimeInterface
    {
        return $this->datelastmodified;
    }

    public function setDatelastmodified(?\DateTimeInterface $datelastmodified): self
    {
        $this->datelastmodified = $datelastmodified;

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

    public function getUid(): ?Users
    {
        return $this->uid;
    }

    public function setUid(?Users $uid): self
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * @return Collection|Fmprojects[]
     */
    public function getPid(): Collection
    {
        return $this->pid;
    }

    public function addPid(Fmprojects $pid): self
    {
        if (!$this->pid->contains($pid)) {
            $this->pid[] = $pid;
            $pid->addClid($this);
        }

        return $this;
    }

    public function removePid(Fmprojects $pid): self
    {
        if ($this->pid->contains($pid)) {
            $this->pid->removeElement($pid);
            $pid->removeClid($this);
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
            $refid->addClid($this);
        }

        return $this;
    }

    public function removeRefid(Referenceobject $refid): self
    {
        if ($this->refid->contains($refid)) {
            $this->refid->removeElement($refid);
            $refid->removeClid($this);
        }

        return $this;
    }

}
