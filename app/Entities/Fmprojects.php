<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fmprojects
 *
 * @ORM\Table(name="fmprojects", indexes={@ORM\Index(name="FK_parentpid_proj", columns={"parentpid"})})
 * @ORM\Entity
 */
class Fmprojects
{
    /**
     * @var int
     *
     * @ORM\Column(name="pid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pid;

    /**
     * @var string
     *
     * @ORM\Column(name="projname", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $projname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="displayname", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $displayname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="managers", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $managers;

    /**
     * @var string|null
     *
     * @ORM\Column(name="briefdescription", type="string", length=300, precision=0, scale=0, nullable=true, unique=false)
     */
    private $briefdescription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="fulldescription", type="string", length=2000, precision=0, scale=0, nullable=true, unique=false)
     */
    private $fulldescription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

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
     * @ORM\Column(name="occurrencesearch", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     */
    private $occurrencesearch;

    /**
     * @var int
     *
     * @ORM\Column(name="ispublic", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     */
    private $ispublic;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $dynamicproperties;

    /**
     * @var int
     *
     * @ORM\Column(name="SortSequence", type="integer", precision=0, scale=0, nullable=false, options={"default"="50","unsigned"=true}, unique=false)
     */
    private $sortsequence = '50';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Fmprojects
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Fmprojects")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parentpid", referencedColumnName="pid", nullable=true)
     * })
     */
    private $parentpid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Fmchecklists", inversedBy="pid")
     * @ORM\JoinTable(name="fmchklstprojlink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="pid", referencedColumnName="pid", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="clid", referencedColumnName="CLID", nullable=true)
     *   }
     * )
     */
    private $clid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->clid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get pid.
     *
     * @return int
     */
    public function getPid()
    {
        return $this->pid;
    }

    /**
     * Set projname.
     *
     * @param string $projname
     *
     * @return Fmprojects
     */
    public function setProjname($projname)
    {
        $this->projname = $projname;

        return $this;
    }

    /**
     * Get projname.
     *
     * @return string
     */
    public function getProjname()
    {
        return $this->projname;
    }

    /**
     * Set displayname.
     *
     * @param string|null $displayname
     *
     * @return Fmprojects
     */
    public function setDisplayname($displayname = null)
    {
        $this->displayname = $displayname;

        return $this;
    }

    /**
     * Get displayname.
     *
     * @return string|null
     */
    public function getDisplayname()
    {
        return $this->displayname;
    }

    /**
     * Set managers.
     *
     * @param string|null $managers
     *
     * @return Fmprojects
     */
    public function setManagers($managers = null)
    {
        $this->managers = $managers;

        return $this;
    }

    /**
     * Get managers.
     *
     * @return string|null
     */
    public function getManagers()
    {
        return $this->managers;
    }

    /**
     * Set briefdescription.
     *
     * @param string|null $briefdescription
     *
     * @return Fmprojects
     */
    public function setBriefdescription($briefdescription = null)
    {
        $this->briefdescription = $briefdescription;

        return $this;
    }

    /**
     * Get briefdescription.
     *
     * @return string|null
     */
    public function getBriefdescription()
    {
        return $this->briefdescription;
    }

    /**
     * Set fulldescription.
     *
     * @param string|null $fulldescription
     *
     * @return Fmprojects
     */
    public function setFulldescription($fulldescription = null)
    {
        $this->fulldescription = $fulldescription;

        return $this;
    }

    /**
     * Get fulldescription.
     *
     * @return string|null
     */
    public function getFulldescription()
    {
        return $this->fulldescription;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Fmprojects
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
     * Set iconurl.
     *
     * @param string|null $iconurl
     *
     * @return Fmprojects
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
     * @return Fmprojects
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
     * Set occurrencesearch.
     *
     * @param int $occurrencesearch
     *
     * @return Fmprojects
     */
    public function setOccurrencesearch($occurrencesearch)
    {
        $this->occurrencesearch = $occurrencesearch;

        return $this;
    }

    /**
     * Get occurrencesearch.
     *
     * @return int
     */
    public function getOccurrencesearch()
    {
        return $this->occurrencesearch;
    }

    /**
     * Set ispublic.
     *
     * @param int $ispublic
     *
     * @return Fmprojects
     */
    public function setIspublic($ispublic)
    {
        $this->ispublic = $ispublic;

        return $this;
    }

    /**
     * Get ispublic.
     *
     * @return int
     */
    public function getIspublic()
    {
        return $this->ispublic;
    }

    /**
     * Set dynamicproperties.
     *
     * @param string|null $dynamicproperties
     *
     * @return Fmprojects
     */
    public function setDynamicproperties($dynamicproperties = null)
    {
        $this->dynamicproperties = $dynamicproperties;

        return $this;
    }

    /**
     * Get dynamicproperties.
     *
     * @return string|null
     */
    public function getDynamicproperties()
    {
        return $this->dynamicproperties;
    }

    /**
     * Set sortsequence.
     *
     * @param int $sortsequence
     *
     * @return Fmprojects
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
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Fmprojects
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
     * Set parentpid.
     *
     * @param \App\Entities\Fmprojects|null $parentpid
     *
     * @return Fmprojects
     */
    public function setParentpid(\App\Entities\Fmprojects $parentpid = null)
    {
        $this->parentpid = $parentpid;

        return $this;
    }

    /**
     * Get parentpid.
     *
     * @return \App\Entities\Fmprojects|null
     */
    public function getParentpid()
    {
        return $this->parentpid;
    }

    /**
     * Add clid.
     *
     * @param \App\Entities\Fmchecklists $clid
     *
     * @return Fmprojects
     */
    public function addClid(\App\Entities\Fmchecklists $clid)
    {
        $this->clid[] = $clid;

        return $this;
    }

    /**
     * Remove clid.
     *
     * @param \App\Entities\Fmchecklists $clid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeClid(\App\Entities\Fmchecklists $clid)
    {
        return $this->clid->removeElement($clid);
    }

    /**
     * Get clid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClid()
    {
        return $this->clid;
    }
}
