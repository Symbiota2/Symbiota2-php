<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kmcslang
 *
 * @ORM\Table(name="kmcslang", indexes={@ORM\Index(name="FK_cslang_lang_idx", columns={"langid"})})
 * @ORM\Entity
 */
class Kmcslang
{
    /**
     * @var int
     *
     * @ORM\Column(name="cid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cid;

    /**
     * @var string
     *
     * @ORM\Column(name="cs", type="string", length=16, precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cs;

    /**
     * @var int
     *
     * @ORM\Column(name="langid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $langid;

    /**
     * @var string
     *
     * @ORM\Column(name="charstatename", type="string", length=150, precision=0, scale=0, nullable=false, unique=false)
     */
    private $charstatename;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $language;

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
     * @var \DateTime
     *
     * @ORM\Column(name="intialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $intialtimestamp = 'CURRENT_TIMESTAMP';


    /**
     * Set cid.
     *
     * @param int $cid
     *
     * @return Kmcslang
     */
    public function setCid($cid)
    {
        $this->cid = $cid;

        return $this;
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
     * Set cs.
     *
     * @param string $cs
     *
     * @return Kmcslang
     */
    public function setCs($cs)
    {
        $this->cs = $cs;

        return $this;
    }

    /**
     * Get cs.
     *
     * @return string
     */
    public function getCs()
    {
        return $this->cs;
    }

    /**
     * Set langid.
     *
     * @param int $langid
     *
     * @return Kmcslang
     */
    public function setLangid($langid)
    {
        $this->langid = $langid;

        return $this;
    }

    /**
     * Get langid.
     *
     * @return int
     */
    public function getLangid()
    {
        return $this->langid;
    }

    /**
     * Set charstatename.
     *
     * @param string $charstatename
     *
     * @return Kmcslang
     */
    public function setCharstatename($charstatename)
    {
        $this->charstatename = $charstatename;

        return $this;
    }

    /**
     * Get charstatename.
     *
     * @return string
     */
    public function getCharstatename()
    {
        return $this->charstatename;
    }

    /**
     * Set language.
     *
     * @param string $language
     *
     * @return Kmcslang
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
     * Set description.
     *
     * @param string|null $description
     *
     * @return Kmcslang
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
     * @return Kmcslang
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
     * Set intialtimestamp.
     *
     * @param \DateTime $intialtimestamp
     *
     * @return Kmcslang
     */
    public function setIntialtimestamp($intialtimestamp)
    {
        $this->intialtimestamp = $intialtimestamp;

        return $this;
    }

    /**
     * Get intialtimestamp.
     *
     * @return \DateTime
     */
    public function getIntialtimestamp()
    {
        return $this->intialtimestamp;
    }
}
