<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tmtraits
 *
 * @ORM\Table(name="tmtraits", indexes={@ORM\Index(name="traitsname", columns={"traitname"}), @ORM\Index(name="FK_traits_uidcreated_idx", columns={"createduid"}), @ORM\Index(name="FK_traits_uidmodified_idx", columns={"modifieduid"})})
 * @ORM\Entity
 */
class Tmtraits
{
    /**
     * @var int
     *
     * @ORM\Column(name="traitid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $traitid;

    /**
     * @var string
     *
     * @ORM\Column(name="traitname", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $traitname;

    /**
     * @var string
     *
     * @ORM\Column(name="traittype", type="string", length=2, precision=0, scale=0, nullable=false, options={"default"="UM"}, unique=false)
     */
    private $traittype = 'UM';

    /**
     * @var string|null
     *
     * @ORM\Column(name="units", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $units;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="refurl", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $refurl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $dynamicproperties;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datelastmodified", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $datelastmodified;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Taxa", inversedBy="traitid")
     * @ORM\JoinTable(name="tmtraittaxalink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="traitid", referencedColumnName="traitid", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tid", referencedColumnName="tid", nullable=true)
     *   }
     * )
     */
    private $tid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get traitid.
     *
     * @return int
     */
    public function getTraitid()
    {
        return $this->traitid;
    }

    /**
     * Set traitname.
     *
     * @param string $traitname
     *
     * @return Tmtraits
     */
    public function setTraitname($traitname)
    {
        $this->traitname = $traitname;

        return $this;
    }

    /**
     * Get traitname.
     *
     * @return string
     */
    public function getTraitname()
    {
        return $this->traitname;
    }

    /**
     * Set traittype.
     *
     * @param string $traittype
     *
     * @return Tmtraits
     */
    public function setTraittype($traittype)
    {
        $this->traittype = $traittype;

        return $this;
    }

    /**
     * Get traittype.
     *
     * @return string
     */
    public function getTraittype()
    {
        return $this->traittype;
    }

    /**
     * Set units.
     *
     * @param string|null $units
     *
     * @return Tmtraits
     */
    public function setUnits($units = null)
    {
        $this->units = $units;

        return $this;
    }

    /**
     * Get units.
     *
     * @return string|null
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return Tmtraits
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
     * Set refurl.
     *
     * @param string|null $refurl
     *
     * @return Tmtraits
     */
    public function setRefurl($refurl = null)
    {
        $this->refurl = $refurl;

        return $this;
    }

    /**
     * Get refurl.
     *
     * @return string|null
     */
    public function getRefurl()
    {
        return $this->refurl;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Tmtraits
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
     * Set dynamicproperties.
     *
     * @param string|null $dynamicproperties
     *
     * @return Tmtraits
     */
    public function setDynamicproperties($dynamicproperties = null)
    {
        $this->dynamicproperties = $dynamicproperties;

        return $this;
    }

    /**
     * Get dynamicproperties.
     *
     * @return string|null
     */
    public function getDynamicproperties()
    {
        return $this->dynamicproperties;
    }

    /**
     * Set datelastmodified.
     *
     * @param \DateTime|null $datelastmodified
     *
     * @return Tmtraits
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
     * @param \DateTime $initialtimestamp
     *
     * @return Tmtraits
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
     * Set createduid.
     *
     * @param \App\Entities\User|null $createduid
     *
     * @return Tmtraits
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
     * @return Tmtraits
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

    /**
     * Add tid.
     *
     * @param \App\Entities\Taxa $tid
     *
     * @return Tmtraits
     */
    public function addTid(\App\Entities\Taxa $tid)
    {
        $this->tid[] = $tid;

        return $this;
    }

    /**
     * Remove tid.
     *
     * @param \App\Entities\Taxa $tid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTid(\App\Entities\Taxa $tid)
    {
        return $this->tid->removeElement($tid);
    }

    /**
     * Get tid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTid()
    {
        return $this->tid;
    }
}
