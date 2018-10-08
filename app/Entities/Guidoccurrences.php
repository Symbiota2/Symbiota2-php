<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Guidoccurrences
 *
 * @ORM\Table(name="guidoccurrences", uniqueConstraints={@ORM\UniqueConstraint(name="guidoccurrences_occid_unique", columns={"occid"})})
 * @ORM\Entity
 */
class Guidoccurrences
{
    /**
     * @var string
     *
     * @ORM\Column(name="guid", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $guid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="occid", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $occid;

    /**
     * @var int
     *
     * @ORM\Column(name="archivestatus", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $archivestatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="archiveobj", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $archiveobj;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';


    /**
     * Get guid.
     *
     * @return string
     */
    public function getGuid()
    {
        return $this->guid;
    }

    /**
     * Set occid.
     *
     * @param int|null $occid
     *
     * @return Guidoccurrences
     */
    public function setOccid($occid = null)
    {
        $this->occid = $occid;

        return $this;
    }

    /**
     * Get occid.
     *
     * @return int|null
     */
    public function getOccid()
    {
        return $this->occid;
    }

    /**
     * Set archivestatus.
     *
     * @param int $archivestatus
     *
     * @return Guidoccurrences
     */
    public function setArchivestatus($archivestatus)
    {
        $this->archivestatus = $archivestatus;

        return $this;
    }

    /**
     * Get archivestatus.
     *
     * @return int
     */
    public function getArchivestatus()
    {
        return $this->archivestatus;
    }

    /**
     * Set archiveobj.
     *
     * @param string|null $archiveobj
     *
     * @return Guidoccurrences
     */
    public function setArchiveobj($archiveobj = null)
    {
        $this->archiveobj = $archiveobj;

        return $this;
    }

    /**
     * Get archiveobj.
     *
     * @return string|null
     */
    public function getArchiveobj()
    {
        return $this->archiveobj;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Guidoccurrences
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
     * @return Guidoccurrences
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
}
