<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fmchklstcoordinates
 *
 * @ORM\Table(name="fmchklstcoordinates", uniqueConstraints={@ORM\UniqueConstraint(name="IndexUnique", columns={"clid", "tid", "decimallatitude", "decimallongitude"})}, indexes={@ORM\Index(name="FKchklsttaxalink", columns={"clid", "tid"})})
 * @ORM\Entity(repositoryClass="App\Repository\FmchklstcoordinatesRepository")
 */
class Fmchklstcoordinates
{
    /**
     * @var int
     *
     * @ORM\Column(name="chklstcoordid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $chklstcoordid;

    /**
     * @var int
     *
     * @ORM\Column(name="clid", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $clid;

    /**
     * @var int
     *
     * @ORM\Column(name="tid", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $tid;

    /**
     * @var float
     *
     * @ORM\Column(name="decimallatitude", type="float", precision=10, scale=0, nullable=false)
     */
    private $decimallatitude;

    /**
     * @var float
     *
     * @ORM\Column(name="decimallongitude", type="float", precision=10, scale=0, nullable=false)
     */
    private $decimallongitude;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $notes = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    public function getChklstcoordid(): ?int
    {
        return $this->chklstcoordid;
    }

    public function getClid(): ?int
    {
        return $this->clid;
    }

    public function setClid(int $clid): self
    {
        $this->clid = $clid;

        return $this;
    }

    public function getTid(): ?int
    {
        return $this->tid;
    }

    public function setTid(int $tid): self
    {
        $this->tid = $tid;

        return $this;
    }

    public function getDecimallatitude(): ?float
    {
        return $this->decimallatitude;
    }

    public function setDecimallatitude(float $decimallatitude): self
    {
        $this->decimallatitude = $decimallatitude;

        return $this;
    }

    public function getDecimallongitude(): ?float
    {
        return $this->decimallongitude;
    }

    public function setDecimallongitude(float $decimallongitude): self
    {
        $this->decimallongitude = $decimallongitude;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

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
