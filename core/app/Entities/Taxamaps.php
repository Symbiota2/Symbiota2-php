<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taxamaps
 *
 * @ORM\Table(name="taxamaps", indexes={@ORM\Index(name="FK_tid_idx", columns={"tid"})})
 * @ORM\Entity
 */
class Taxamaps
{
    /**
     * @var int
     *
     * @ORM\Column(name="mid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $mid;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Taxa
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="tid", nullable=true)
     * })
     */
    private $tid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Taxaprofilepubs", inversedBy="mid")
     * @ORM\JoinTable(name="taxaprofilepubmaplink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="mid", referencedColumnName="mid", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tppid", referencedColumnName="tppid", nullable=true)
     *   }
     * )
     */
    private $tppid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tppid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get mid.
     *
     * @return int
     */
    public function getMid()
    {
        return $this->mid;
    }

    /**
     * Set url.
     *
     * @param string $url
     *
     * @return Taxamaps
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set title.
     *
     * @param string|null $title
     *
     * @return Taxamaps
     */
    public function setTitle($title = null)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Taxamaps
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
     * Set tid.
     *
     * @param \App\Entities\Taxa|null $tid
     *
     * @return Taxamaps
     */
    public function setTid(\App\Entities\Taxa $tid = null)
    {
        $this->tid = $tid;

        return $this;
    }

    /**
     * Get tid.
     *
     * @return \App\Entities\Taxa|null
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Add tppid.
     *
     * @param \App\Entities\Taxaprofilepubs $tppid
     *
     * @return Taxamaps
     */
    public function addTppid(\App\Entities\Taxaprofilepubs $tppid)
    {
        $this->tppid[] = $tppid;

        return $this;
    }

    /**
     * Remove tppid.
     *
     * @param \App\Entities\Taxaprofilepubs $tppid
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTppid(\App\Entities\Taxaprofilepubs $tppid)
    {
        return $this->tppid->removeElement($tppid);
    }

    /**
     * Get tppid.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTppid()
    {
        return $this->tppid;
    }
}
