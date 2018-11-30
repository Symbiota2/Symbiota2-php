<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Guidimages
 *
 * @ORM\Table(name="guidimages", uniqueConstraints={@ORM\UniqueConstraint(name="guidimages_imgid_unique", columns={"imgid"})})
 * @ORM\Entity
 */
class Guidimages
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
     * @ORM\Column(name="imgid", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $imgid;

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
     * Set imgid.
     *
     * @param int|null $imgid
     *
     * @return Guidimages
     */
    public function setImgid($imgid = null)
    {
        $this->imgid = $imgid;

        return $this;
    }

    /**
     * Get imgid.
     *
     * @return int|null
     */
    public function getImgid()
    {
        return $this->imgid;
    }

    /**
     * Set archivestatus.
     *
     * @param int $archivestatus
     *
     * @return Guidimages
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
     * @return Guidimages
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
     * @return Guidimages
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
     * @return Guidimages
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
