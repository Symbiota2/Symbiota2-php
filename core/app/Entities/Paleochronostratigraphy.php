<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paleochronostratigraphy
 *
 * @ORM\Table(name="paleochronostratigraphy", indexes={@ORM\Index(name="Eon", columns={"Eon"}), @ORM\Index(name="Era", columns={"Era"}), @ORM\Index(name="Period", columns={"Period"}), @ORM\Index(name="Epoch", columns={"Epoch"}), @ORM\Index(name="Stage", columns={"Stage"})})
 * @ORM\Entity
 */
class Paleochronostratigraphy
{
    /**
     * @var int
     *
     * @ORM\Column(name="chronoId", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $chronoid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Eon", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $eon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Era", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $era;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Period", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $period;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Epoch", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $epoch;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Stage", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $stage;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Entities\Omoccurrences", mappedBy="chronoid")
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
     * Get chronoid.
     *
     * @return int
     */
    public function getChronoid()
    {
        return $this->chronoid;
    }

    /**
     * Set eon.
     *
     * @param string|null $eon
     *
     * @return Paleochronostratigraphy
     */
    public function setEon($eon = null)
    {
        $this->eon = $eon;

        return $this;
    }

    /**
     * Get eon.
     *
     * @return string|null
     */
    public function getEon()
    {
        return $this->eon;
    }

    /**
     * Set era.
     *
     * @param string|null $era
     *
     * @return Paleochronostratigraphy
     */
    public function setEra($era = null)
    {
        $this->era = $era;

        return $this;
    }

    /**
     * Get era.
     *
     * @return string|null
     */
    public function getEra()
    {
        return $this->era;
    }

    /**
     * Set period.
     *
     * @param string|null $period
     *
     * @return Paleochronostratigraphy
     */
    public function setPeriod($period = null)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get period.
     *
     * @return string|null
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set epoch.
     *
     * @param string|null $epoch
     *
     * @return Paleochronostratigraphy
     */
    public function setEpoch($epoch = null)
    {
        $this->epoch = $epoch;

        return $this;
    }

    /**
     * Get epoch.
     *
     * @return string|null
     */
    public function getEpoch()
    {
        return $this->epoch;
    }

    /**
     * Set stage.
     *
     * @param string|null $stage
     *
     * @return Paleochronostratigraphy
     */
    public function setStage($stage = null)
    {
        $this->stage = $stage;

        return $this;
    }

    /**
     * Get stage.
     *
     * @return string|null
     */
    public function getStage()
    {
        return $this->stage;
    }

    /**
     * Add occid.
     *
     * @param \App\Entities\Omoccurrences $occid
     *
     * @return Paleochronostratigraphy
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
