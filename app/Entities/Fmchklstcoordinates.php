<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fmchklstcoordinates
 *
 * @ORM\Table(name="fmchklstcoordinates", uniqueConstraints={@ORM\UniqueConstraint(name="IndexUnique", columns={"clid", "tid", "decimallatitude", "decimallongitude"})}, indexes={@ORM\Index(name="FKchklsttaxalink", columns={"clid", "tid"})})
 * @ORM\Entity
 */
class Fmchklstcoordinates
{
    /**
     * @var int
     *
     * @ORM\Column(name="chklstcoordid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $chklstcoordid;

    /**
     * @var int
     *
     * @ORM\Column(name="clid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     */
    private $clid;

    /**
     * @var int
     *
     * @ORM\Column(name="tid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     */
    private $tid;

    /**
     * @var float
     *
     * @ORM\Column(name="decimallatitude", type="float", precision=10, scale=0, nullable=false, unique=false)
     */
    private $decimallatitude;

    /**
     * @var float
     *
     * @ORM\Column(name="decimallongitude", type="float", precision=10, scale=0, nullable=false, unique=false)
     */
    private $decimallongitude;

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
     * Get chklstcoordid.
     *
     * @return int
     */
    public function getChklstcoordid()
    {
        return $this->chklstcoordid;
    }

    /**
     * Set clid.
     *
     * @param int $clid
     *
     * @return Fmchklstcoordinates
     */
    public function setClid($clid)
    {
        $this->clid = $clid;

        return $this;
    }

    /**
     * Get clid.
     *
     * @return int
     */
    public function getClid()
    {
        return $this->clid;
    }

    /**
     * Set tid.
     *
     * @param int $tid
     *
     * @return Fmchklstcoordinates
     */
    public function setTid($tid)
    {
        $this->tid = $tid;

        return $this;
    }

    /**
     * Get tid.
     *
     * @return int
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Set decimallatitude.
     *
     * @param float $decimallatitude
     *
     * @return Fmchklstcoordinates
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
     * @return Fmchklstcoordinates
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
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Fmchklstcoordinates
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
     * @return Fmchklstcoordinates
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
