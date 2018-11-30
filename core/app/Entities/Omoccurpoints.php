<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurpoints
 *
 * @ORM\Table(name="omoccurpoints", uniqueConstraints={@ORM\UniqueConstraint(name="occid", columns={"occid"})}, indexes={@ORM\Index(name="point", columns={"point"})})
 * @ORM\Entity
 */
class Omoccurpoints
{
    /**
     * @var int
     *
     * @ORM\Column(name="geoID", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $geoid;

    /**
     * @var int
     *
     * @ORM\Column(name="occid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $occid;

    /**
     * @var point
     *
     * @ORM\Column(name="point", type="point", precision=0, scale=0, nullable=false, unique=false)
     */
    private $point;

    /**
     * @var polygon|null
     *
     * @ORM\Column(name="errradiuspoly", type="polygon", precision=0, scale=0, nullable=true, unique=false)
     */
    private $errradiuspoly;

    /**
     * @var polygon|null
     *
     * @ORM\Column(name="footprintpoly", type="polygon", precision=0, scale=0, nullable=true, unique=false)
     */
    private $footprintpoly;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';


    /**
     * Get geoid.
     *
     * @return int
     */
    public function getGeoid()
    {
        return $this->geoid;
    }

    /**
     * Set occid.
     *
     * @param int $occid
     *
     * @return Omoccurpoints
     */
    public function setOccid($occid)
    {
        $this->occid = $occid;

        return $this;
    }

    /**
     * Get occid.
     *
     * @return int
     */
    public function getOccid()
    {
        return $this->occid;
    }

    /**
     * Set point.
     *
     * @param point $point
     *
     * @return Omoccurpoints
     */
    public function setPoint($point)
    {
        $this->point = $point;

        return $this;
    }

    /**
     * Get point.
     *
     * @return point
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * Set errradiuspoly.
     *
     * @param polygon|null $errradiuspoly
     *
     * @return Omoccurpoints
     */
    public function setErrradiuspoly($errradiuspoly = null)
    {
        $this->errradiuspoly = $errradiuspoly;

        return $this;
    }

    /**
     * Get errradiuspoly.
     *
     * @return polygon|null
     */
    public function getErrradiuspoly()
    {
        return $this->errradiuspoly;
    }

    /**
     * Set footprintpoly.
     *
     * @param polygon|null $footprintpoly
     *
     * @return Omoccurpoints
     */
    public function setFootprintpoly($footprintpoly = null)
    {
        $this->footprintpoly = $footprintpoly;

        return $this;
    }

    /**
     * Get footprintpoly.
     *
     * @return polygon|null
     */
    public function getFootprintpoly()
    {
        return $this->footprintpoly;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Omoccurpoints
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
