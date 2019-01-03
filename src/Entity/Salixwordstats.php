<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salixwordstats
 *
 * @ORM\Table(name="salixwordstats", uniqueConstraints={@ORM\UniqueConstraint(name="INDEX_unique", columns={"firstword", "secondword"})}, indexes={@ORM\Index(name="INDEX_secondword", columns={"secondword"})})
 * @ORM\Entity(repositoryClass="App\Repository\SalixwordstatsRepository")
 */
class Salixwordstats
{
    /**
     * @var int
     *
     * @ORM\Column(name="swsid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $swsid;

    /**
     * @var string
     *
     * @ORM\Column(name="firstword", type="string", length=45, nullable=false)
     */
    private $firstword;

    /**
     * @var string|null
     *
     * @ORM\Column(name="secondword", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $secondword = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="locality", type="integer", nullable=false)
     */
    private $locality;

    /**
     * @var int
     *
     * @ORM\Column(name="localityFreq", type="integer", nullable=false)
     */
    private $localityfreq;

    /**
     * @var int
     *
     * @ORM\Column(name="habitat", type="integer", nullable=false)
     */
    private $habitat;

    /**
     * @var int
     *
     * @ORM\Column(name="habitatFreq", type="integer", nullable=false)
     */
    private $habitatfreq;

    /**
     * @var int
     *
     * @ORM\Column(name="substrate", type="integer", nullable=false)
     */
    private $substrate;

    /**
     * @var int
     *
     * @ORM\Column(name="substrateFreq", type="integer", nullable=false)
     */
    private $substratefreq;

    /**
     * @var int
     *
     * @ORM\Column(name="verbatimAttributes", type="integer", nullable=false)
     */
    private $verbatimattributes;

    /**
     * @var int
     *
     * @ORM\Column(name="verbatimAttributesFreq", type="integer", nullable=false)
     */
    private $verbatimattributesfreq;

    /**
     * @var int
     *
     * @ORM\Column(name="occurrenceRemarks", type="integer", nullable=false)
     */
    private $occurrenceremarks;

    /**
     * @var int
     *
     * @ORM\Column(name="occurrenceRemarksFreq", type="integer", nullable=false)
     */
    private $occurrenceremarksfreq;

    /**
     * @var int
     *
     * @ORM\Column(name="totalcount", type="integer", nullable=false)
     */
    private $totalcount;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getSwsid(): ?int
    {
        return $this->swsid;
    }

    public function getFirstword(): ?string
    {
        return $this->firstword;
    }

    public function setFirstword(string $firstword): self
    {
        $this->firstword = $firstword;

        return $this;
    }

    public function getSecondword(): ?string
    {
        return $this->secondword;
    }

    public function setSecondword(?string $secondword): self
    {
        $this->secondword = $secondword;

        return $this;
    }

    public function getLocality(): ?int
    {
        return $this->locality;
    }

    public function setLocality(int $locality): self
    {
        $this->locality = $locality;

        return $this;
    }

    public function getLocalityfreq(): ?int
    {
        return $this->localityfreq;
    }

    public function setLocalityfreq(int $localityfreq): self
    {
        $this->localityfreq = $localityfreq;

        return $this;
    }

    public function getHabitat(): ?int
    {
        return $this->habitat;
    }

    public function setHabitat(int $habitat): self
    {
        $this->habitat = $habitat;

        return $this;
    }

    public function getHabitatfreq(): ?int
    {
        return $this->habitatfreq;
    }

    public function setHabitatfreq(int $habitatfreq): self
    {
        $this->habitatfreq = $habitatfreq;

        return $this;
    }

    public function getSubstrate(): ?int
    {
        return $this->substrate;
    }

    public function setSubstrate(int $substrate): self
    {
        $this->substrate = $substrate;

        return $this;
    }

    public function getSubstratefreq(): ?int
    {
        return $this->substratefreq;
    }

    public function setSubstratefreq(int $substratefreq): self
    {
        $this->substratefreq = $substratefreq;

        return $this;
    }

    public function getVerbatimattributes(): ?int
    {
        return $this->verbatimattributes;
    }

    public function setVerbatimattributes(int $verbatimattributes): self
    {
        $this->verbatimattributes = $verbatimattributes;

        return $this;
    }

    public function getVerbatimattributesfreq(): ?int
    {
        return $this->verbatimattributesfreq;
    }

    public function setVerbatimattributesfreq(int $verbatimattributesfreq): self
    {
        $this->verbatimattributesfreq = $verbatimattributesfreq;

        return $this;
    }

    public function getOccurrenceremarks(): ?int
    {
        return $this->occurrenceremarks;
    }

    public function setOccurrenceremarks(int $occurrenceremarks): self
    {
        $this->occurrenceremarks = $occurrenceremarks;

        return $this;
    }

    public function getOccurrenceremarksfreq(): ?int
    {
        return $this->occurrenceremarksfreq;
    }

    public function setOccurrenceremarksfreq(int $occurrenceremarksfreq): self
    {
        $this->occurrenceremarksfreq = $occurrenceremarksfreq;

        return $this;
    }

    public function getTotalcount(): ?int
    {
        return $this->totalcount;
    }

    public function setTotalcount(int $totalcount): self
    {
        $this->totalcount = $totalcount;

        return $this;
    }

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(?\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }


}
