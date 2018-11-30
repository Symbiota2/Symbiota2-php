<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kmcharheading
 *
 * @ORM\Table(name="kmcharheading", uniqueConstraints={@ORM\UniqueConstraint(name="unique_kmcharheading", columns={"headingname", "langid"})}, indexes={@ORM\Index(name="HeadingName", columns={"headingname"}), @ORM\Index(name="FK_kmcharheading_lang_idx", columns={"langid"})})
 * @ORM\Entity
 */
class Kmcharheading
{
    /**
     * @var int
     *
     * @ORM\Column(name="hid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $hid;

    /**
     * @var string
     *
     * @ORM\Column(name="headingname", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $headingname;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=45, precision=0, scale=0, nullable=false, options={"default"="English"}, unique=false)
     */
    private $language = 'English';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="text", length=0, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortsequence", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $sortsequence;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Adminlanguages
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="App\Entities\Adminlanguages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="langid", referencedColumnName="langid", nullable=true)
     * })
     */
    private $langid;


    /**
     * Set hid.
     *
     * @param int $hid
     *
     * @return Kmcharheading
     */
    public function setHid($hid)
    {
        $this->hid = $hid;

        return $this;
    }

    /**
     * Get hid.
     *
     * @return int
     */
    public function getHid()
    {
        return $this->hid;
    }

    /**
     * Set headingname.
     *
     * @param string $headingname
     *
     * @return Kmcharheading
     */
    public function setHeadingname($headingname)
    {
        $this->headingname = $headingname;

        return $this;
    }

    /**
     * Get headingname.
     *
     * @return string
     */
    public function getHeadingname()
    {
        return $this->headingname;
    }

    /**
     * Set language.
     *
     * @param string $language
     *
     * @return Kmcharheading
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
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Kmcharheading
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
     * Set sortsequence.
     *
     * @param int|null $sortsequence
     *
     * @return Kmcharheading
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
     * @return Kmcharheading
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
     * @param \App\Entities\Adminlanguages $langid
     *
     * @return Kmcharheading
     */
    public function setLangid(\App\Entities\Adminlanguages $langid)
    {
        $this->langid = $langid;

        return $this;
    }

    /**
     * Get langid.
     *
     * @return \App\Entities\Adminlanguages
     */
    public function getLangid()
    {
        return $this->langid;
    }
}
