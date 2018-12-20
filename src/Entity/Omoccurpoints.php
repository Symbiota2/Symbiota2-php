<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurpoints
 *
 * @ORM\Table(name="omoccurpoints", uniqueConstraints={@ORM\UniqueConstraint(name="occid", columns={"occid"})}, indexes={@ORM\Index(name="point", columns={"point"})})
 * @ORM\Entity(repositoryClass="App\Repository\OmoccurpointsRepository")
 */
class Omoccurpoints
{
    /**
     * @var int
     *
     * @ORM\Column(name="geoID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $geoid;

    /**
     * @var int
     *
     * @ORM\Column(name="occid", type="integer", nullable=false)
     */
    private $occid;

    /**
     * @var point
     *
     * @ORM\Column(name="point", type="point", nullable=false)
     */
    private $point;

    /**
     * @var polygon|null
     *
     * @ORM\Column(name="errradiuspoly", type="polygon", nullable=true, options={"default"="NULL"})
     */
    private $errradiuspoly = 'NULL';

    /**
     * @var polygon|null
     *
     * @ORM\Column(name="footprintpoly", type="polygon", nullable=true, options={"default"="NULL"})
     */
    private $footprintpoly = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    public function getGeoid(): ?int
    {
        return $this->geoid;
    }

    public function getOccid(): ?int
    {
        return $this->occid;
    }

    public function setOccid(int $occid): self
    {
        $this->occid = $occid;

        return $this;
    }

    public function getPoint()
    {
        return $this->point;
    }

    public function setPoint($point): self
    {
        $this->point = $point;

        return $this;
    }

    public function getErrradiuspoly()
    {
        return $this->errradiuspoly;
    }

    public function setErrradiuspoly($errradiuspoly): self
    {
        $this->errradiuspoly = $errradiuspoly;

        return $this;
    }

    public function getFootprintpoly()
    {
        return $this->footprintpoly;
    }

    public function setFootprintpoly($footprintpoly): self
    {
        $this->footprintpoly = $footprintpoly;

        return $this;
    }

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }


}
