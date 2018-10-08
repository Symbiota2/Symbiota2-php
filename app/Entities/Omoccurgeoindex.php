<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurgeoindex
 *
 * @ORM\Table(name="omoccurgeoindex", indexes={@ORM\Index(name="IDX_375D79BD52596C31", columns={"tid"})})
 * @ORM\Entity
 */
class Omoccurgeoindex
{
    /**
     * @var float
     *
     * @ORM\Column(name="decimallatitude", type="float", precision=10, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $decimallatitude;

    /**
     * @var float
     *
     * @ORM\Column(name="decimallongitude", type="float", precision=10, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $decimallongitude;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Taxa
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="App\Entities\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="tid", nullable=true)
     * })
     */
    private $tid;


    /**
     * Set decimallatitude.
     *
     * @param float $decimallatitude
     *
     * @return Omoccurgeoindex
     */
    public function setDecimallatitude($decimallatitude)
    {
        $this->decimallatitude = $decimallatitude;

        return $this;
    }

    /**
     * Get decimallatitude.
     *
     * @return float
     */
    public function getDecimallatitude()
    {
        return $this->decimallatitude;
    }

    /**
     * Set decimallongitude.
     *
     * @param float $decimallongitude
     *
     * @return Omoccurgeoindex
     */
    public function setDecimallongitude($decimallongitude)
    {
        $this->decimallongitude = $decimallongitude;

        return $this;
    }

    /**
     * Get decimallongitude.
     *
     * @return float
     */
    public function getDecimallongitude()
    {
        return $this->decimallongitude;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Omoccurgeoindex
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
     * @param \App\Entities\Taxa $tid
     *
     * @return Omoccurgeoindex
     */
    public function setTid(\App\Entities\Taxa $tid)
    {
        $this->tid = $tid;

        return $this;
    }

    /**
     * Get tid.
     *
     * @return \App\Entities\Taxa
     */
    public function getTid()
    {
        return $this->tid;
    }
}
