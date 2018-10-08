<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fmdynamicchecklists
 *
 * @ORM\Table(name="fmdynamicchecklists")
 * @ORM\Entity
 */
class Fmdynamicchecklists
{
    /**
     * @var int
     *
     * @ORM\Column(name="dynclid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $dynclid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="details", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $details;

    /**
     * @var string|null
     *
     * @ORM\Column(name="uid", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $uid;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=45, precision=0, scale=0, nullable=false, options={"default"="DynamicList"}, unique=false)
     */
    private $type = 'DynamicList';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expiration", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $expiration;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Taxa", inversedBy="dynclid")
     * @ORM\JoinTable(name="fmdyncltaxalink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="dynclid", referencedColumnName="dynclid", nullable=true)
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
     * Get dynclid.
     *
     * @return int
     */
    public function getDynclid()
    {
        return $this->dynclid;
    }

    /**
     * Set name.
     *
     * @param string|null $name
     *
     * @return Fmdynamicchecklists
     */
    public function setName($name = null)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set details.
     *
     * @param string|null $details
     *
     * @return Fmdynamicchecklists
     */
    public function setDetails($details = null)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details.
     *
     * @return string|null
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set uid.
     *
     * @param string|null $uid
     *
     * @return Fmdynamicchecklists
     */
    public function setUid($uid = null)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid.
     *
     * @return string|null
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set type.
     *
     * @param string $type
     *
     * @return Fmdynamicchecklists
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Fmdynamicchecklists
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
     * Set expiration.
     *
     * @param \DateTime $expiration
     *
     * @return Fmdynamicchecklists
     */
    public function setExpiration($expiration)
    {
        $this->expiration = $expiration;

        return $this;
    }

    /**
     * Get expiration.
     *
     * @return \DateTime
     */
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Fmdynamicchecklists
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
     * Add tid.
     *
     * @param \App\Entities\Taxa $tid
     *
     * @return Fmdynamicchecklists
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
