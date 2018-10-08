<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Imageprojects
 *
 * @ORM\Table(name="imageprojects")
 * @ORM\Entity
 */
class Imageprojects
{
    /**
     * @var int
     *
     * @ORM\Column(name="imgprojid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $imgprojid;

    /**
     * @var string
     *
     * @ORM\Column(name="projectname", type="string", length=75, precision=0, scale=0, nullable=false, unique=false)
     */
    private $projectname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="managers", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $managers;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=1000, precision=0, scale=0, nullable=true, unique=false)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="ispublic", type="integer", precision=0, scale=0, nullable=false, options={"default"="1"}, unique=false)
     */
    private $ispublic = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="uidcreated", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $uidcreated;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortsequence", type="integer", precision=0, scale=0, nullable=true, options={"default"="50"}, unique=false)
     */
    private $sortsequence = '50';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Images", mappedBy="imgprojid")
     */
    private $imgid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->imgid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get imgprojid.
     *
     * @return int
     */
    public function getImgprojid()
    {
        return $this->imgprojid;
    }

    /**
     * Set projectname.
     *
     * @param string $projectname
     *
     * @return Imageprojects
     */
    public function setProjectname($projectname)
    {
        $this->projectname = $projectname;

        return $this;
    }

    /**
     * Get projectname.
     *
     * @return string
     */
    public function getProjectname()
    {
        return $this->projectname;
    }

    /**
     * Set managers.
     *
     * @param string|null $managers
     *
     * @return Imageprojects
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
     * Set description.
     *
     * @param string|null $description
     *
     * @return Imageprojects
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
     * Set ispublic.
     *
     * @param int $ispublic
     *
     * @return Imageprojects
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
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Imageprojects
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
     * Set uidcreated.
     *
     * @param int|null $uidcreated
     *
     * @return Imageprojects
     */
    public function setUidcreated($uidcreated = null)
    {
        $this->uidcreated = $uidcreated;

        return $this;
    }

    /**
     * Get uidcreated.
     *
     * @return int|null
     */
    public function getUidcreated()
    {
        return $this->uidcreated;
    }

    /**
     * Set sortsequence.
     *
     * @param int|null $sortsequence
     *
     * @return Imageprojects
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
     * @return Imageprojects
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
     * Add imgid.
     *
     * @param \App\Entities\Images $imgid
     *
     * @return Imageprojects
     */
    public function addImgid(\App\Entities\Images $imgid)
    {
        $this->imgid[] = $imgid;

        return $this;
    }

    /**
     * Remove imgid.
     *
     * @param \App\Entities\Images $imgid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeImgid(\App\Entities\Images $imgid)
    {
        return $this->imgid->removeElement($imgid);
    }

    /**
     * Get imgid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImgid()
    {
        return $this->imgid;
    }
}
