<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Paleochronostratigraphy
 *
 * @ORM\Table(name="paleochronostratigraphy", indexes={@ORM\Index(name="Period", columns={"Period"}), @ORM\Index(name="Era", columns={"Era"}), @ORM\Index(name="Stage", columns={"Stage"}), @ORM\Index(name="Eon", columns={"Eon"}), @ORM\Index(name="Epoch", columns={"Epoch"})})
 * @ORM\Entity(repositoryClass="App\Repository\PaleochronostratigraphyRepository")
 */
class Paleochronostratigraphy
{
    /**
     * @var int
     *
     * @ORM\Column(name="chronoId", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $chronoid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Eon", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $eon = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Era", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $era = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Period", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $period = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Epoch", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $epoch = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Stage", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $stage = 'NULL';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Omoccurrences", mappedBy="chronoid")
     */
    private $occid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->occid = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getChronoid(): ?int
    {
        return $this->chronoid;
    }

    public function getEon(): ?string
    {
        return $this->eon;
    }

    public function setEon(?string $eon): self
    {
        $this->eon = $eon;

        return $this;
    }

    public function getEra(): ?string
    {
        return $this->era;
    }

    public function setEra(?string $era): self
    {
        $this->era = $era;

        return $this;
    }

    public function getPeriod(): ?string
    {
        return $this->period;
    }

    public function setPeriod(?string $period): self
    {
        $this->period = $period;

        return $this;
    }

    public function getEpoch(): ?string
    {
        return $this->epoch;
    }

    public function setEpoch(?string $epoch): self
    {
        $this->epoch = $epoch;

        return $this;
    }

    public function getStage(): ?string
    {
        return $this->stage;
    }

    public function setStage(?string $stage): self
    {
        $this->stage = $stage;

        return $this;
    }

    /**
     * @return Collection|Omoccurrences[]
     */
    public function getOccid(): Collection
    {
        return $this->occid;
    }

    public function addOccid(Omoccurrences $occid): self
    {
        if (!$this->occid->contains($occid)) {
            $this->occid[] = $occid;
            $occid->addChronoid($this);
        }

        return $this;
    }

    public function removeOccid(Omoccurrences $occid): self
    {
        if ($this->occid->contains($occid)) {
            $this->occid->removeElement($occid);
            $occid->removeChronoid($this);
        }

        return $this;
    }

}
