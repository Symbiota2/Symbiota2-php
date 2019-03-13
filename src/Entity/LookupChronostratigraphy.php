<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * LookupChronostratigraphy
 *
 * @ORM\Table(name="paleochronostratigraphy", indexes={@ORM\Index(name="Period", columns={"Period"}), @ORM\Index(name="Era", columns={"Era"}), @ORM\Index(name="Stage", columns={"Stage"}), @ORM\Index(name="Eon", columns={"Eon"}), @ORM\Index(name="Epoch", columns={"Epoch"})})
 * @ORM\Entity(repositoryClass="App\Repository\LookupChronostratigraphyRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class LookupChronostratigraphy
{
    /**
     * @var int
     *
     * @ORM\Column(name="chronoId", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Eon", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $eon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Era", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $era;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Period", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $period;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Epoch", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $epoch;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Stage", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $stage;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Occurrences", mappedBy="chronostratigraphyId")
     */
    private $occurrenceId;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->occurrenceId = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection|Occurrences[]
     */
    public function getOccurrenceId(): Collection
    {
        return $this->occurrenceId;
    }

    public function addOccurrenceId(Occurrences $occurrenceId): self
    {
        if (!$this->occurrenceId->contains($occurrenceId)) {
            $this->occurrenceId[] = $occurrenceId;
            $occurrenceId->addChronostratigraphyId($this);
        }

        return $this;
    }

    public function removeOccurrenceId(Occurrences $occurrenceId): self
    {
        if ($this->occurrenceId->contains($occurrenceId)) {
            $this->occurrenceId->removeElement($occurrenceId);
            $occurrenceId->removeChronostratigraphyId($this);
        }

        return $this;
    }

}
