<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omcollcategories
 *
 * @ORM\Table(name="omcollcategories")
 * @ORM\Entity
 */
class Omcollcategories
{
    /**
     * @var int
     *
     * @ORM\Column(name="ccpk", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ccpk;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=75, precision=0, scale=0, nullable=false, unique=false)
     */
    private $category;

    /**
     * @var string|null
     *
     * @ORM\Column(name="icon", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $icon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="acronym", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $acronym;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $url;

    /**
     * @var int|null
     *
     * @ORM\Column(name="inclusive", type="integer", precision=0, scale=0, nullable=true, options={"default"="1"}, unique=false)
     */
    private $inclusive = '1';

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Omcollections", inversedBy="ccpk")
     * @ORM\JoinTable(name="omcollcatlink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ccpk", referencedColumnName="ccpk", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="collid", referencedColumnName="CollID", nullable=true)
     *   }
     * )
     */
    private $collid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->collid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get ccpk.
     *
     * @return int
     */
    public function getCcpk()
    {
        return $this->ccpk;
    }

    /**
     * Set category.
     *
     * @param string $category
     *
     * @return Omcollcategories
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category.
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set icon.
     *
     * @param string|null $icon
     *
     * @return Omcollcategories
     */
    public function setIcon($icon = null)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon.
     *
     * @return string|null
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set acronym.
     *
     * @param string|null $acronym
     *
     * @return Omcollcategories
     */
    public function setAcronym($acronym = null)
    {
        $this->acronym = $acronym;

        return $this;
    }

    /**
     * Get acronym.
     *
     * @return string|null
     */
    public function getAcronym()
    {
        return $this->acronym;
    }

    /**
     * Set url.
     *
     * @param string|null $url
     *
     * @return Omcollcategories
     */
    public function setUrl($url = null)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url.
     *
     * @return string|null
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set inclusive.
     *
     * @param int|null $inclusive
     *
     * @return Omcollcategories
     */
    public function setInclusive($inclusive = null)
    {
        $this->inclusive = $inclusive;

        return $this;
    }

    /**
     * Get inclusive.
     *
     * @return int|null
     */
    public function getInclusive()
    {
        return $this->inclusive;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Omcollcategories
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
     * @return Omcollcategories
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
     * Add collid.
     *
     * @param \App\Entities\Omcollections $collid
     *
     * @return Omcollcategories
     */
    public function addCollid(\App\Entities\Omcollections $collid)
    {
        $this->collid[] = $collid;

        return $this;
    }

    /**
     * Remove collid.
     *
     * @param \App\Entities\Omcollections $collid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCollid(\App\Entities\Omcollections $collid)
    {
        return $this->collid->removeElement($collid);
    }

    /**
     * Get collid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCollid()
    {
        return $this->collid;
    }
}
