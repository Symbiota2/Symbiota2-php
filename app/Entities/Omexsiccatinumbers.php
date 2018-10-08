<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omexsiccatinumbers
 *
 * @ORM\Table(name="omexsiccatinumbers", uniqueConstraints={@ORM\UniqueConstraint(name="Index_omexsiccatinumbers_unique", columns={"exsnumber", "ometid"})}, indexes={@ORM\Index(name="FK_exsiccatiTitleNumber", columns={"ometid"})})
 * @ORM\Entity
 */
class Omexsiccatinumbers
{
    /**
     * @var int
     *
     * @ORM\Column(name="omenid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $omenid;

    /**
     * @var string
     *
     * @ORM\Column(name="exsnumber", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $exsnumber;

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
     * @var \App\Entities\Omexsiccatititles
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Omexsiccatititles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ometid", referencedColumnName="ometid", nullable=true)
     * })
     */
    private $ometid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Omoccurrences", inversedBy="omenid")
     * @ORM\JoinTable(name="omexsiccatiocclink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="omenid", referencedColumnName="omenid", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="occid", referencedColumnName="occid", nullable=true)
     *   }
     * )
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
     * Get omenid.
     *
     * @return int
     */
    public function getOmenid()
    {
        return $this->omenid;
    }

    /**
     * Set exsnumber.
     *
     * @param string $exsnumber
     *
     * @return Omexsiccatinumbers
     */
    public function setExsnumber($exsnumber)
    {
        $this->exsnumber = $exsnumber;

        return $this;
    }

    /**
     * Get exsnumber.
     *
     * @return string
     */
    public function getExsnumber()
    {
        return $this->exsnumber;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Omexsiccatinumbers
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
     * @return Omexsiccatinumbers
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
     * Set ometid.
     *
     * @param \App\Entities\Omexsiccatititles|null $ometid
     *
     * @return Omexsiccatinumbers
     */
    public function setOmetid(\App\Entities\Omexsiccatititles $ometid = null)
    {
        $this->ometid = $ometid;

        return $this;
    }

    /**
     * Get ometid.
     *
     * @return \App\Entities\Omexsiccatititles|null
     */
    public function getOmetid()
    {
        return $this->ometid;
    }

    /**
     * Add occid.
     *
     * @param \App\Entities\Omoccurrences $occid
     *
     * @return Omexsiccatinumbers
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
