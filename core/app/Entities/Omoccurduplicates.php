<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurduplicates
 *
 * @ORM\Table(name="omoccurduplicates")
 * @ORM\Entity
 */
class Omoccurduplicates
{
    /**
     * @var int
     *
     * @ORM\Column(name="duplicateid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $duplicateid;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50, precision=0, scale=0, nullable=false, unique=false)
     */
    private $title;

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
     * @var string
     *
     * @ORM\Column(name="dupeType", type="string", length=45, precision=0, scale=0, nullable=false, options={"default"="Exact Duplicate"}, unique=false)
     */
    private $dupetype = 'Exact Duplicate';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialTimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Omoccurrences", mappedBy="duplicateid")
     */
    private $occid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->occid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get duplicateid.
     *
     * @return int
     */
    public function getDuplicateid()
    {
        return $this->duplicateid;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Omoccurduplicates
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return Omoccurduplicates
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
     * @return Omoccurduplicates
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
     * Set dupetype.
     *
     * @param string $dupetype
     *
     * @return Omoccurduplicates
     */
    public function setDupetype($dupetype)
    {
        $this->dupetype = $dupetype;

        return $this;
    }

    /**
     * Get dupetype.
     *
     * @return string
     */
    public function getDupetype()
    {
        return $this->dupetype;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Omoccurduplicates
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
     * Add occid.
     *
     * @param \App\Entities\Omoccurrences $occid
     *
     * @return Omoccurduplicates
     */
    public function addOccid(\App\Entities\Omoccurrences $occid)
    {
        $this->occid[] = $occid;

        return $this;
    }

    /**
     * Remove occid.
     *
     * @param \App\Entities\Omoccurrences $occid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeOccid(\App\Entities\Omoccurrences $occid)
    {
        return $this->occid->removeElement($occid);
    }

    /**
     * Get occid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOccid()
    {
        return $this->occid;
    }
}
