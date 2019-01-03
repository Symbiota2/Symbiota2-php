<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurgeoindex
 *
 * @ORM\Table(name="omoccurgeoindex", indexes={@ORM\Index(name="IDX_375D79BD52596C31", columns={"tid"})})
 * @ORM\Entity(repositoryClass="App\Repository\OmoccurgeoindexRepository")
 */
class Omoccurgeoindex
{
    /**
     * @var float
     *
     * @ORM\Column(name="decimallatitude", type="float", precision=10, scale=0, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $decimallatitude;

    /**
     * @var float
     *
     * @ORM\Column(name="decimallongitude", type="float", precision=10, scale=0, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $decimallongitude;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Taxa
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     * })
     */
    private $tid;

    public function getDecimallatitude(): ?float
    {
        return $this->decimallatitude;
    }

    public function getDecimallongitude(): ?float
    {
        return $this->decimallongitude;
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

    public function getTid(): ?Taxa
    {
        return $this->tid;
    }

    public function setTid(?Taxa $tid): self
    {
        $this->tid = $tid;

        return $this;
    }


}
