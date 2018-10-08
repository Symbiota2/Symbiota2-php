<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kmcharacters
 *
 * @ORM\Table(name="kmcharacters", indexes={@ORM\Index(name="Index_charname", columns={"charname"}), @ORM\Index(name="Index_sort", columns={"sortsequence"}), @ORM\Index(name="FK_charheading_idx", columns={"hid"})})
 * @ORM\Entity
 */
class Kmcharacters
{
    /**
     * @var int
     *
     * @ORM\Column(name="cid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cid;

    /**
     * @var string
     *
     * @ORM\Column(name="charname", type="string", length=150, precision=0, scale=0, nullable=false, unique=false)
     */
    private $charname;

    /**
     * @var string
     *
     * @ORM\Column(name="chartype", type="string", length=2, precision=0, scale=0, nullable=false, options={"default"="UM"}, unique=false)
     */
    private $chartype = 'UM';

    /**
     * @var string
     *
     * @ORM\Column(name="defaultlang", type="string", length=45, precision=0, scale=0, nullable=false, options={"default"="English"}, unique=false)
     */
    private $defaultlang = 'English';

    /**
     * @var int
     *
     * @ORM\Column(name="difficultyrank", type="smallint", precision=0, scale=0, nullable=false, options={"default"="1","unsigned"=true}, unique=false)
     */
    private $difficultyrank = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="units", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $units;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="display", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $display;

    /**
     * @var string|null
     *
     * @ORM\Column(name="helpurl", type="string", length=500, precision=0, scale=0, nullable=true, unique=false)
     */
    private $helpurl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="enteredby", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $enteredby;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortsequence", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $sortsequence;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Kmcharheading
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Kmcharheading")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hid", referencedColumnName="hid", nullable=false)
     * })
     */
    private $hid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Adminlanguages", inversedBy="cid")
     * @ORM\JoinTable(name="kmcharacterlang",
     *   joinColumns={
     *     @ORM\JoinColumn(name="cid", referencedColumnName="cid", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="langid", referencedColumnName="langid", nullable=true)
     *   }
     * )
     */
    private $langid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Taxa", inversedBy="cid")
     * @ORM\JoinTable(name="kmchartaxalink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="CID", referencedColumnName="cid", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tid", referencedColumnName="tid", nullable=true)
     *   }
     * )
     */
    private $tid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->langid = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get cid.
     *
     * @return int
     */
    public function getCid()
    {
        return $this->cid;
    }

    /**
     * Set charname.
     *
     * @param string $charname
     *
     * @return Kmcharacters
     */
    public function setCharname($charname)
    {
        $this->charname = $charname;

        return $this;
    }

    /**
     * Get charname.
     *
     * @return string
     */
    public function getCharname()
    {
        return $this->charname;
    }

    /**
     * Set chartype.
     *
     * @param string $chartype
     *
     * @return Kmcharacters
     */
    public function setChartype($chartype)
    {
        $this->chartype = $chartype;

        return $this;
    }

    /**
     * Get chartype.
     *
     * @return string
     */
    public function getChartype()
    {
        return $this->chartype;
    }

    /**
     * Set defaultlang.
     *
     * @param string $defaultlang
     *
     * @return Kmcharacters
     */
    public function setDefaultlang($defaultlang)
    {
        $this->defaultlang = $defaultlang;

        return $this;
    }

    /**
     * Get defaultlang.
     *
     * @return string
     */
    public function getDefaultlang()
    {
        return $this->defaultlang;
    }

    /**
     * Set difficultyrank.
     *
     * @param int $difficultyrank
     *
     * @return Kmcharacters
     */
    public function setDifficultyrank($difficultyrank)
    {
        $this->difficultyrank = $difficultyrank;

        return $this;
    }

    /**
     * Get difficultyrank.
     *
     * @return int
     */
    public function getDifficultyrank()
    {
        return $this->difficultyrank;
    }

    /**
     * Set units.
     *
     * @param string|null $units
     *
     * @return Kmcharacters
     */
    public function setUnits($units = null)
    {
        $this->units = $units;

        return $this;
    }

    /**
     * Get units.
     *
     * @return string|null
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return Kmcharacters
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Kmcharacters
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
     * Set display.
     *
     * @param string|null $display
     *
     * @return Kmcharacters
     */
    public function setDisplay($display = null)
    {
        $this->display = $display;

        return $this;
    }

    /**
     * Get display.
     *
     * @return string|null
     */
    public function getDisplay()
    {
        return $this->display;
    }

    /**
     * Set helpurl.
     *
     * @param string|null $helpurl
     *
     * @return Kmcharacters
     */
    public function setHelpurl($helpurl = null)
    {
        $this->helpurl = $helpurl;

        return $this;
    }

    /**
     * Get helpurl.
     *
     * @return string|null
     */
    public function getHelpurl()
    {
        return $this->helpurl;
    }

    /**
     * Set enteredby.
     *
     * @param string|null $enteredby
     *
     * @return Kmcharacters
     */
    public function setEnteredby($enteredby = null)
    {
        $this->enteredby = $enteredby;

        return $this;
    }

    /**
     * Get enteredby.
     *
     * @return string|null
     */
    public function getEnteredby()
    {
        return $this->enteredby;
    }

    /**
     * Set sortsequence.
     *
     * @param int|null $sortsequence
     *
     * @return Kmcharacters
     */
    public function setSortsequence($sortsequence = null)
    {
        $this->sortsequence = $sortsequence;

        return $this;
    }

    /**
     * Get sortsequence.
     *
     * @return int|null
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
     * @return Kmcharacters
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
     * Set hid.
     *
     * @param \App\Entities\Kmcharheading|null $hid
     *
     * @return Kmcharacters
     */
    public function setHid(\App\Entities\Kmcharheading $hid = null)
    {
        $this->hid = $hid;

        return $this;
    }

    /**
     * Get hid.
     *
     * @return \App\Entities\Kmcharheading|null
     */
    public function getHid()
    {
        return $this->hid;
    }

    /**
     * Add langid.
     *
     * @param \App\Entities\Adminlanguages $langid
     *
     * @return Kmcharacters
     */
    public function addLangid(\App\Entities\Adminlanguages $langid)
    {
        $this->langid[] = $langid;

        return $this;
    }

    /**
     * Remove langid.
     *
     * @param \App\Entities\Adminlanguages $langid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeLangid(\App\Entities\Adminlanguages $langid)
    {
        return $this->langid->removeElement($langid);
    }

    /**
     * Get langid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLangid()
    {
        return $this->langid;
    }

    /**
     * Add tid.
     *
     * @param \App\Entities\Taxa $tid
     *
     * @return Kmcharacters
     */
    public function addTid(\App\Entities\Taxa $tid)
    {
        $this->tid[] = $tid;

        return $this;
    }

    /**
     * Remove tid.
     *
     * @param \App\Entities\Taxa $tid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTid(\App\Entities\Taxa $tid)
    {
        return $this->tid->removeElement($tid);
    }

    /**
     * Get tid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTid()
    {
        return $this->tid;
    }
}
