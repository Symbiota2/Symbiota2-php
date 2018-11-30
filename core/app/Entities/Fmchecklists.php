<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fmchecklists
 *
 * @ORM\Table(name="fmchecklists", indexes={@ORM\Index(name="FK_checklists_uid", columns={"uid"}), @ORM\Index(name="name", columns={"Name", "Type"})})
 * @ORM\Entity
 */
class Fmchecklists
{
    /**
     * @var int
     *
     * @ORM\Column(name="CLID", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $clid;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Title", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Locality", type="string", length=500, precision=0, scale=0, nullable=true, unique=false)
     */
    private $locality;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Publication", type="string", length=500, precision=0, scale=0, nullable=true, unique=false)
     */
    private $publication;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Abstract", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $abstract;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Authors", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $authors;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Type", type="string", length=50, precision=0, scale=0, nullable=true, options={"default"="static"}, unique=false)
     */
    private $type = 'static';

    /**
     * @var string|null
     *
     * @ORM\Column(name="politicalDivision", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $politicaldivision;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicsql", type="string", length=500, precision=0, scale=0, nullable=true, unique=false)
     */
    private $dynamicsql;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Parent", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $parent;

    /**
     * @var int|null
     *
     * @ORM\Column(name="parentclid", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $parentclid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Notes", type="string", length=500, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var float|null
     *
     * @ORM\Column(name="LatCentroid", type="float", precision=9, scale=6, nullable=true, unique=false)
     */
    private $latcentroid;

    /**
     * @var float|null
     *
     * @ORM\Column(name="LongCentroid", type="float", precision=9, scale=6, nullable=true, unique=false)
     */
    private $longcentroid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="pointradiusmeters", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $pointradiusmeters;

    /**
     * @var string|null
     *
     * @ORM\Column(name="footprintWKT", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $footprintwkt;

    /**
     * @var int|null
     *
     * @ORM\Column(name="percenteffort", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $percenteffort;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Access", type="string", length=45, precision=0, scale=0, nullable=true, options={"default"="private"}, unique=false)
     */
    private $access = 'private';

    /**
     * @var string|null
     *
     * @ORM\Column(name="defaultSettings", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $defaultsettings;

    /**
     * @var string|null
     *
     * @ORM\Column(name="iconUrl", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $iconurl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="headerUrl", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $headerurl;

    /**
     * @var int
     *
     * @ORM\Column(name="SortSequence", type="integer", precision=0, scale=0, nullable=false, options={"default"="50","unsigned"=true}, unique=false)
     */
    private $sortsequence = '50';

    /**
     * @var int|null
     *
     * @ORM\Column(name="expiration", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $expiration;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="DateLastModified", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $datelastmodified;

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
     *   @ORM\JoinColumn(name="uid", referencedColumnName="uid", nullable=true)
     * })
     */
    private $uid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Fmprojects", mappedBy="clid")
     */
    private $pid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Referenceobject", mappedBy="clid")
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

    /**
     * Get clid.
     *
     * @return int
     */
    public function getClid()
    {
        return $this->clid;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Fmchecklists
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set title.
     *
     * @param string|null $title
     *
     * @return Fmchecklists
     */
    public function setTitle($title = null)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set locality.
     *
     * @param string|null $locality
     *
     * @return Fmchecklists
     */
    public function setLocality($locality = null)
    {
        $this->locality = $locality;

        return $this;
    }

    /**
     * Get locality.
     *
     * @return string|null
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * Set publication.
     *
     * @param string|null $publication
     *
     * @return Fmchecklists
     */
    public function setPublication($publication = null)
    {
        $this->publication = $publication;

        return $this;
    }

    /**
     * Get publication.
     *
     * @return string|null
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * Set abstract.
     *
     * @param string|null $abstract
     *
     * @return Fmchecklists
     */
    public function setAbstract($abstract = null)
    {
        $this->abstract = $abstract;

        return $this;
    }

    /**
     * Get abstract.
     *
     * @return string|null
     */
    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * Set authors.
     *
     * @param string|null $authors
     *
     * @return Fmchecklists
     */
    public function setAuthors($authors = null)
    {
        $this->authors = $authors;

        return $this;
    }

    /**
     * Get authors.
     *
     * @return string|null
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    /**
     * Set type.
     *
     * @param string|null $type
     *
     * @return Fmchecklists
     */
    public function setType($type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set politicaldivision.
     *
     * @param string|null $politicaldivision
     *
     * @return Fmchecklists
     */
    public function setPoliticaldivision($politicaldivision = null)
    {
        $this->politicaldivision = $politicaldivision;

        return $this;
    }

    /**
     * Get politicaldivision.
     *
     * @return string|null
     */
    public function getPoliticaldivision()
    {
        return $this->politicaldivision;
    }

    /**
     * Set dynamicsql.
     *
     * @param string|null $dynamicsql
     *
     * @return Fmchecklists
     */
    public function setDynamicsql($dynamicsql = null)
    {
        $this->dynamicsql = $dynamicsql;

        return $this;
    }

    /**
     * Get dynamicsql.
     *
     * @return string|null
     */
    public function getDynamicsql()
    {
        return $this->dynamicsql;
    }

    /**
     * Set parent.
     *
     * @param string|null $parent
     *
     * @return Fmchecklists
     */
    public function setParent($parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent.
     *
     * @return string|null
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set parentclid.
     *
     * @param int|null $parentclid
     *
     * @return Fmchecklists
     */
    public function setParentclid($parentclid = null)
    {
        $this->parentclid = $parentclid;

        return $this;
    }

    /**
     * Get parentclid.
     *
     * @return int|null
     */
    public function getParentclid()
    {
        return $this->parentclid;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Fmchecklists
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
     * Set latcentroid.
     *
     * @param float|null $latcentroid
     *
     * @return Fmchecklists
     */
    public function setLatcentroid($latcentroid = null)
    {
        $this->latcentroid = $latcentroid;

        return $this;
    }

    /**
     * Get latcentroid.
     *
     * @return float|null
     */
    public function getLatcentroid()
    {
        return $this->latcentroid;
    }

    /**
     * Set longcentroid.
     *
     * @param float|null $longcentroid
     *
     * @return Fmchecklists
     */
    public function setLongcentroid($longcentroid = null)
    {
        $this->longcentroid = $longcentroid;

        return $this;
    }

    /**
     * Get longcentroid.
     *
     * @return float|null
     */
    public function getLongcentroid()
    {
        return $this->longcentroid;
    }

    /**
     * Set pointradiusmeters.
     *
     * @param int|null $pointradiusmeters
     *
     * @return Fmchecklists
     */
    public function setPointradiusmeters($pointradiusmeters = null)
    {
        $this->pointradiusmeters = $pointradiusmeters;

        return $this;
    }

    /**
     * Get pointradiusmeters.
     *
     * @return int|null
     */
    public function getPointradiusmeters()
    {
        return $this->pointradiusmeters;
    }

    /**
     * Set footprintwkt.
     *
     * @param string|null $footprintwkt
     *
     * @return Fmchecklists
     */
    public function setFootprintwkt($footprintwkt = null)
    {
        $this->footprintwkt = $footprintwkt;

        return $this;
    }

    /**
     * Get footprintwkt.
     *
     * @return string|null
     */
    public function getFootprintwkt()
    {
        return $this->footprintwkt;
    }

    /**
     * Set percenteffort.
     *
     * @param int|null $percenteffort
     *
     * @return Fmchecklists
     */
    public function setPercenteffort($percenteffort = null)
    {
        $this->percenteffort = $percenteffort;

        return $this;
    }

    /**
     * Get percenteffort.
     *
     * @return int|null
     */
    public function getPercenteffort()
    {
        return $this->percenteffort;
    }

    /**
     * Set access.
     *
     * @param string|null $access
     *
     * @return Fmchecklists
     */
    public function setAccess($access = null)
    {
        $this->access = $access;

        return $this;
    }

    /**
     * Get access.
     *
     * @return string|null
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * Set defaultsettings.
     *
     * @param string|null $defaultsettings
     *
     * @return Fmchecklists
     */
    public function setDefaultsettings($defaultsettings = null)
    {
        $this->defaultsettings = $defaultsettings;

        return $this;
    }

    /**
     * Get defaultsettings.
     *
     * @return string|null
     */
    public function getDefaultsettings()
    {
        return $this->defaultsettings;
    }

    /**
     * Set iconurl.
     *
     * @param string|null $iconurl
     *
     * @return Fmchecklists
     */
    public function setIconurl($iconurl = null)
    {
        $this->iconurl = $iconurl;

        return $this;
    }

    /**
     * Get iconurl.
     *
     * @return string|null
     */
    public function getIconurl()
    {
        return $this->iconurl;
    }

    /**
     * Set headerurl.
     *
     * @param string|null $headerurl
     *
     * @return Fmchecklists
     */
    public function setHeaderurl($headerurl = null)
    {
        $this->headerurl = $headerurl;

        return $this;
    }

    /**
     * Get headerurl.
     *
     * @return string|null
     */
    public function getHeaderurl()
    {
        return $this->headerurl;
    }

    /**
     * Set sortsequence.
     *
     * @param int $sortsequence
     *
     * @return Fmchecklists
     */
    public function setSortsequence($sortsequence)
    {
        $this->sortsequence = $sortsequence;

        return $this;
    }

    /**
     * Get sortsequence.
     *
     * @return int
     */
    public function getSortsequence()
    {
        return $this->sortsequence;
    }

    /**
     * Set expiration.
     *
     * @param int|null $expiration
     *
     * @return Fmchecklists
     */
    public function setExpiration($expiration = null)
    {
        $this->expiration = $expiration;

        return $this;
    }

    /**
     * Get expiration.
     *
     * @return int|null
     */
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     * Set datelastmodified.
     *
     * @param \DateTime|null $datelastmodified
     *
     * @return Fmchecklists
     */
    public function setDatelastmodified($datelastmodified = null)
    {
        $this->datelastmodified = $datelastmodified;

        return $this;
    }

    /**
     * Get datelastmodified.
     *
     * @return \DateTime|null
     */
    public function getDatelastmodified()
    {
        return $this->datelastmodified;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Fmchecklists
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
     * Set uid.
     *
     * @param \App\Entities\User|null $uid
     *
     * @return Fmchecklists
     */
    public function setUid(\App\Entities\User $uid = null)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid.
     *
     * @return \App\Entities\User|null
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Add pid.
     *
     * @param \App\Entities\Fmprojects $pid
     *
     * @return Fmchecklists
     */
    public function addPid(\App\Entities\Fmprojects $pid)
    {
        $this->pid[] = $pid;

        return $this;
    }

    /**
     * Remove pid.
     *
     * @param \App\Entities\Fmprojects $pid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePid(\App\Entities\Fmprojects $pid)
    {
        return $this->pid->removeElement($pid);
    }

    /**
     * Get pid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * Add refid.
     *
     * @param \App\Entities\Referenceobject $refid
     *
     * @return Fmchecklists
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
}
