<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Guidoccurdeterminations
 *
 * @ORM\Table(name="guidoccurdeterminations", uniqueConstraints={@ORM\UniqueConstraint(name="guidoccurdet_detid_unique", columns={"detid"})})
 * @ORM\Entity
 */
class Guidoccurdeterminations
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
     * @ORM\Column(name="detid", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $detid;

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
     * Set detid.
     *
     * @param int|null $detid
     *
     * @return Guidoccurdeterminations
     */
    public function setDetid($detid = null)
    {
        $this->detid = $detid;

        return $this;
    }

    /**
     * Get detid.
     *
     * @return int|null
     */
    public function getDetid()
    {
        return $this->detid;
    }

    /**
     * Set archivestatus.
     *
     * @param int $archivestatus
     *
     * @return Guidoccurdeterminations
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
     * @return Guidoccurdeterminations
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
     * @return Guidoccurdeterminations
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
     * @return Guidoccurdeterminations
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
