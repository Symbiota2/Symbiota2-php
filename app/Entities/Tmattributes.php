<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tmattributes
 *
 * @ORM\Table(name="tmattributes", indexes={@ORM\Index(name="FK_tmattr_stateid_idx", columns={"stateid"}), @ORM\Index(name="FK_tmattr_occid_idx", columns={"occid"}), @ORM\Index(name="FK_tmattr_imgid_idx", columns={"imgid"}), @ORM\Index(name="FK_attr_uidcreate_idx", columns={"createduid"}), @ORM\Index(name="FK_tmattr_uidmodified_idx", columns={"modifieduid"})})
 * @ORM\Entity
 */
class Tmattributes
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="modifier", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $modifier;

    /**
     * @var float|null
     *
     * @ORM\Column(name="xvalue", type="float", precision=15, scale=5, nullable=true, unique=false)
     */
    private $xvalue;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagecoordinates", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $imagecoordinates;

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $source;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="statuscode", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $statuscode;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datelastmodified", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $datelastmodified;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=true, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Images
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Images")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="imgid", referencedColumnName="imgid", nullable=true)
     * })
     */
    private $imgid;

    /**
     * @var \App\Entities\Omoccurrences
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="App\Entities\Omoccurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid", nullable=true)
     * })
     */
    private $occid;

    /**
     * @var \App\Entities\Tmstates
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="App\Entities\Tmstates")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stateid", referencedColumnName="stateid", nullable=true)
     * })
     */
    private $stateid;

    /**
     * @var \App\Entities\User
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="createduid", referencedColumnName="uid", nullable=true)
     * })
     */
    private $createduid;

    /**
     * @var \App\Entities\User
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modifieduid", referencedColumnName="uid", nullable=true)
     * })
     */
    private $modifieduid;


    /**
     * Set modifier.
     *
     * @param string|null $modifier
     *
     * @return Tmattributes
     */
    public function setModifier($modifier = null)
    {
        $this->modifier = $modifier;

        return $this;
    }

    /**
     * Get modifier.
     *
     * @return string|null
     */
    public function getModifier()
    {
        return $this->modifier;
    }

    /**
     * Set xvalue.
     *
     * @param float|null $xvalue
     *
     * @return Tmattributes
     */
    public function setXvalue($xvalue = null)
    {
        $this->xvalue = $xvalue;

        return $this;
    }

    /**
     * Get xvalue.
     *
     * @return float|null
     */
    public function getXvalue()
    {
        return $this->xvalue;
    }

    /**
     * Set imagecoordinates.
     *
     * @param string|null $imagecoordinates
     *
     * @return Tmattributes
     */
    public function setImagecoordinates($imagecoordinates = null)
    {
        $this->imagecoordinates = $imagecoordinates;

        return $this;
    }

    /**
     * Get imagecoordinates.
     *
     * @return string|null
     */
    public function getImagecoordinates()
    {
        return $this->imagecoordinates;
    }

    /**
     * Set source.
     *
     * @param string|null $source
     *
     * @return Tmattributes
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
     * @return Tmattributes
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
     * Set statuscode.
     *
     * @param bool|null $statuscode
     *
     * @return Tmattributes
     */
    public function setStatuscode($statuscode = null)
    {
        $this->statuscode = $statuscode;

        return $this;
    }

    /**
     * Get statuscode.
     *
     * @return bool|null
     */
    public function getStatuscode()
    {
        return $this->statuscode;
    }

    /**
     * Set datelastmodified.
     *
     * @param \DateTime|null $datelastmodified
     *
     * @return Tmattributes
     */
    public function setDatelastmodified($datelastmodified = null)
    {
        $this->datelastmodified = $datelastmodified;

        return $this;
    }

    /**
     * Get datelastmodified.
     *
     * @return \DateTime|null
     */
    public function getDatelastmodified()
    {
        return $this->datelastmodified;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime|null $initialtimestamp
     *
     * @return Tmattributes
     */
    public function setInitialtimestamp($initialtimestamp = null)
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    /**
     * Get initialtimestamp.
     *
     * @return \DateTime|null
     */
    public function getInitialtimestamp()
    {
        return $this->initialtimestamp;
    }

    /**
     * Set imgid.
     *
     * @param \App\Entities\Images|null $imgid
     *
     * @return Tmattributes
     */
    public function setImgid(\App\Entities\Images $imgid = null)
    {
        $this->imgid = $imgid;

        return $this;
    }

    /**
     * Get imgid.
     *
     * @return \App\Entities\Images|null
     */
    public function getImgid()
    {
        return $this->imgid;
    }

    /**
     * Set occid.
     *
     * @param \App\Entities\Omoccurrences $occid
     *
     * @return Tmattributes
     */
    public function setOccid(\App\Entities\Omoccurrences $occid)
    {
        $this->occid = $occid;

        return $this;
    }

    /**
     * Get occid.
     *
     * @return \App\Entities\Omoccurrences
     */
    public function getOccid()
    {
        return $this->occid;
    }

    /**
     * Set stateid.
     *
     * @param \App\Entities\Tmstates $stateid
     *
     * @return Tmattributes
     */
    public function setStateid(\App\Entities\Tmstates $stateid)
    {
        $this->stateid = $stateid;

        return $this;
    }

    /**
     * Get stateid.
     *
     * @return \App\Entities\Tmstates
     */
    public function getStateid()
    {
        return $this->stateid;
    }

    /**
     * Set createduid.
     *
     * @param \App\Entities\User|null $createduid
     *
     * @return Tmattributes
     */
    public function setCreateduid(\App\Entities\User $createduid = null)
    {
        $this->createduid = $createduid;

        return $this;
    }

    /**
     * Get createduid.
     *
     * @return \App\Entities\User|null
     */
    public function getCreateduid()
    {
        return $this->createduid;
    }

    /**
     * Set modifieduid.
     *
     * @param \App\Entities\User|null $modifieduid
     *
     * @return Tmattributes
     */
    public function setModifieduid(\App\Entities\User $modifieduid = null)
    {
        $this->modifieduid = $modifieduid;

        return $this;
    }

    /**
     * Get modifieduid.
     *
     * @return \App\Entities\User|null
     */
    public function getModifieduid()
    {
        return $this->modifieduid;
    }
}
