<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adminlanguages
 *
 * @ORM\Table(name="adminlanguages", uniqueConstraints={@ORM\UniqueConstraint(name="index_langname_unique", columns={"langname"})})
 * @ORM\Entity
 */
class Adminlanguages
{
    /**
     * @var int
     *
     * @ORM\Column(name="langid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $langid;

    /**
     * @var string
     *
     * @ORM\Column(name="langname", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $langname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="iso639_1", type="string", length=10, precision=0, scale=0, nullable=true, unique=false)
     */
    private $iso6391;

    /**
     * @var string|null
     *
     * @ORM\Column(name="iso639_2", type="string", length=10, precision=0, scale=0, nullable=true, unique=false)
     */
    private $iso6392;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Kmcharacters", mappedBy="langid")
     */
    private $cid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cid = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set langname.
     *
     * @param string $langname
     *
     * @return Adminlanguages
     */
    public function setLangname($langname)
    {
        $this->langname = $langname;

        return $this;
    }

    /**
     * Get langname.
     *
     * @return string
     */
    public function getLangname()
    {
        return $this->langname;
    }

    /**
     * Set iso6391.
     *
     * @param string|null $iso6391
     *
     * @return Adminlanguages
     */
    public function setIso6391($iso6391 = null)
    {
        $this->iso6391 = $iso6391;

        return $this;
    }

    /**
     * Get iso6391.
     *
     * @return string|null
     */
    public function getIso6391()
    {
        return $this->iso6391;
    }

    /**
     * Set iso6392.
     *
     * @param string|null $iso6392
     *
     * @return Adminlanguages
     */
    public function setIso6392($iso6392 = null)
    {
        $this->iso6392 = $iso6392;

        return $this;
    }

    /**
     * Get iso6392.
     *
     * @return string|null
     */
    public function getIso6392()
    {
        return $this->iso6392;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Adminlanguages
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
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Adminlanguages
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
     * Add cid.
     *
     * @param \App\Entities\Kmcharacters $cid
     *
     * @return Adminlanguages
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
}
