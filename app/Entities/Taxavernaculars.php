<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taxavernaculars
 *
 * @ORM\Table(name="taxavernaculars", uniqueConstraints={@ORM\UniqueConstraint(name="unique_key", columns={"Language", "VernacularName", "tid"})}, indexes={@ORM\Index(name="tid1", columns={"tid"}), @ORM\Index(name="vernacularsnames", columns={"VernacularName"}), @ORM\Index(name="FK_vern_lang_idx", columns={"langid"})})
 * @ORM\Entity
 */
class Taxavernaculars
{
    /**
     * @var string
     *
     * @ORM\Column(name="VernacularName", type="string", length=80, precision=0, scale=0, nullable=false, unique=false)
     */
    private $vernacularname;

    /**
     * @var string
     *
     * @ORM\Column(name="Language", type="string", length=15, precision=0, scale=0, nullable=false, options={"default"="English"}, unique=false)
     */
    private $language = 'English';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Source", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $source;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="username", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $username;

    /**
     * @var int|null
     *
     * @ORM\Column(name="isupperterm", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $isupperterm;

    /**
     * @var int|null
     *
     * @ORM\Column(name="SortSequence", type="integer", precision=0, scale=0, nullable=true, options={"default"="50"}, unique=false)
     */
    private $sortsequence = '50';

    /**
     * @var int
     *
     * @ORM\Column(name="VID", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $vid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Adminlanguages
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Adminlanguages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="langid", referencedColumnName="langid", nullable=true)
     * })
     */
    private $langid;

    /**
     * @var \App\Entities\Taxa
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="tid", nullable=true)
     * })
     */
    private $tid;


    /**
     * Set vernacularname.
     *
     * @param string $vernacularname
     *
     * @return Taxavernaculars
     */
    public function setVernacularname($vernacularname)
    {
        $this->vernacularname = $vernacularname;

        return $this;
    }

    /**
     * Get vernacularname.
     *
     * @return string
     */
    public function getVernacularname()
    {
        return $this->vernacularname;
    }

    /**
     * Set language.
     *
     * @param string $language
     *
     * @return Taxavernaculars
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language.
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set source.
     *
     * @param string|null $source
     *
     * @return Taxavernaculars
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
     * @return Taxavernaculars
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
     * Set username.
     *
     * @param string|null $username
     *
     * @return Taxavernaculars
     */
    public function setUsername($username = null)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username.
     *
     * @return string|null
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set isupperterm.
     *
     * @param int|null $isupperterm
     *
     * @return Taxavernaculars
     */
    public function setIsupperterm($isupperterm = null)
    {
        $this->isupperterm = $isupperterm;

        return $this;
    }

    /**
     * Get isupperterm.
     *
     * @return int|null
     */
    public function getIsupperterm()
    {
        return $this->isupperterm;
    }

    /**
     * Set sortsequence.
     *
     * @param int|null $sortsequence
     *
     * @return Taxavernaculars
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
     * Get vid.
     *
     * @return int
     */
    public function getVid()
    {
        return $this->vid;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Taxavernaculars
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
     * Set langid.
     *
     * @param \App\Entities\Adminlanguages|null $langid
     *
     * @return Taxavernaculars
     */
    public function setLangid(\App\Entities\Adminlanguages $langid = null)
    {
        $this->langid = $langid;

        return $this;
    }

    /**
     * Get langid.
     *
     * @return \App\Entities\Adminlanguages|null
     */
    public function getLangid()
    {
        return $this->langid;
    }

    /**
     * Set tid.
     *
     * @param \App\Entities\Taxa|null $tid
     *
     * @return Taxavernaculars
     */
    public function setTid(\App\Entities\Taxa $tid = null)
    {
        $this->tid = $tid;

        return $this;
    }

    /**
     * Get tid.
     *
     * @return \App\Entities\Taxa|null
     */
    public function getTid()
    {
        return $this->tid;
    }
}
