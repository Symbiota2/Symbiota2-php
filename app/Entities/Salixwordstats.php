<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salixwordstats
 *
 * @ORM\Table(name="salixwordstats", uniqueConstraints={@ORM\UniqueConstraint(name="INDEX_unique", columns={"firstword", "secondword"})}, indexes={@ORM\Index(name="INDEX_secondword", columns={"secondword"})})
 * @ORM\Entity
 */
class Salixwordstats
{
    /**
     * @var int
     *
     * @ORM\Column(name="swsid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $swsid;

    /**
     * @var string
     *
     * @ORM\Column(name="firstword", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $firstword;

    /**
     * @var string|null
     *
     * @ORM\Column(name="secondword", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $secondword;

    /**
     * @var int
     *
     * @ORM\Column(name="locality", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $locality;

    /**
     * @var int
     *
     * @ORM\Column(name="localityFreq", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $localityfreq;

    /**
     * @var int
     *
     * @ORM\Column(name="habitat", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $habitat;

    /**
     * @var int
     *
     * @ORM\Column(name="habitatFreq", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $habitatfreq;

    /**
     * @var int
     *
     * @ORM\Column(name="substrate", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $substrate;

    /**
     * @var int
     *
     * @ORM\Column(name="substrateFreq", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $substratefreq;

    /**
     * @var int
     *
     * @ORM\Column(name="verbatimAttributes", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $verbatimattributes;

    /**
     * @var int
     *
     * @ORM\Column(name="verbatimAttributesFreq", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $verbatimattributesfreq;

    /**
     * @var int
     *
     * @ORM\Column(name="occurrenceRemarks", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $occurrenceremarks;

    /**
     * @var int
     *
     * @ORM\Column(name="occurrenceRemarksFreq", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $occurrenceremarksfreq;

    /**
     * @var int
     *
     * @ORM\Column(name="totalcount", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $totalcount;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=true, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';


    /**
     * Get swsid.
     *
     * @return int
     */
    public function getSwsid()
    {
        return $this->swsid;
    }

    /**
     * Set firstword.
     *
     * @param string $firstword
     *
     * @return Salixwordstats
     */
    public function setFirstword($firstword)
    {
        $this->firstword = $firstword;

        return $this;
    }

    /**
     * Get firstword.
     *
     * @return string
     */
    public function getFirstword()
    {
        return $this->firstword;
    }

    /**
     * Set secondword.
     *
     * @param string|null $secondword
     *
     * @return Salixwordstats
     */
    public function setSecondword($secondword = null)
    {
        $this->secondword = $secondword;

        return $this;
    }

    /**
     * Get secondword.
     *
     * @return string|null
     */
    public function getSecondword()
    {
        return $this->secondword;
    }

    /**
     * Set locality.
     *
     * @param int $locality
     *
     * @return Salixwordstats
     */
    public function setLocality($locality)
    {
        $this->locality = $locality;

        return $this;
    }

    /**
     * Get locality.
     *
     * @return int
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * Set localityfreq.
     *
     * @param int $localityfreq
     *
     * @return Salixwordstats
     */
    public function setLocalityfreq($localityfreq)
    {
        $this->localityfreq = $localityfreq;

        return $this;
    }

    /**
     * Get localityfreq.
     *
     * @return int
     */
    public function getLocalityfreq()
    {
        return $this->localityfreq;
    }

    /**
     * Set habitat.
     *
     * @param int $habitat
     *
     * @return Salixwordstats
     */
    public function setHabitat($habitat)
    {
        $this->habitat = $habitat;

        return $this;
    }

    /**
     * Get habitat.
     *
     * @return int
     */
    public function getHabitat()
    {
        return $this->habitat;
    }

    /**
     * Set habitatfreq.
     *
     * @param int $habitatfreq
     *
     * @return Salixwordstats
     */
    public function setHabitatfreq($habitatfreq)
    {
        $this->habitatfreq = $habitatfreq;

        return $this;
    }

    /**
     * Get habitatfreq.
     *
     * @return int
     */
    public function getHabitatfreq()
    {
        return $this->habitatfreq;
    }

    /**
     * Set substrate.
     *
     * @param int $substrate
     *
     * @return Salixwordstats
     */
    public function setSubstrate($substrate)
    {
        $this->substrate = $substrate;

        return $this;
    }

    /**
     * Get substrate.
     *
     * @return int
     */
    public function getSubstrate()
    {
        return $this->substrate;
    }

    /**
     * Set substratefreq.
     *
     * @param int $substratefreq
     *
     * @return Salixwordstats
     */
    public function setSubstratefreq($substratefreq)
    {
        $this->substratefreq = $substratefreq;

        return $this;
    }

    /**
     * Get substratefreq.
     *
     * @return int
     */
    public function getSubstratefreq()
    {
        return $this->substratefreq;
    }

    /**
     * Set verbatimattributes.
     *
     * @param int $verbatimattributes
     *
     * @return Salixwordstats
     */
    public function setVerbatimattributes($verbatimattributes)
    {
        $this->verbatimattributes = $verbatimattributes;

        return $this;
    }

    /**
     * Get verbatimattributes.
     *
     * @return int
     */
    public function getVerbatimattributes()
    {
        return $this->verbatimattributes;
    }

    /**
     * Set verbatimattributesfreq.
     *
     * @param int $verbatimattributesfreq
     *
     * @return Salixwordstats
     */
    public function setVerbatimattributesfreq($verbatimattributesfreq)
    {
        $this->verbatimattributesfreq = $verbatimattributesfreq;

        return $this;
    }

    /**
     * Get verbatimattributesfreq.
     *
     * @return int
     */
    public function getVerbatimattributesfreq()
    {
        return $this->verbatimattributesfreq;
    }

    /**
     * Set occurrenceremarks.
     *
     * @param int $occurrenceremarks
     *
     * @return Salixwordstats
     */
    public function setOccurrenceremarks($occurrenceremarks)
    {
        $this->occurrenceremarks = $occurrenceremarks;

        return $this;
    }

    /**
     * Get occurrenceremarks.
     *
     * @return int
     */
    public function getOccurrenceremarks()
    {
        return $this->occurrenceremarks;
    }

    /**
     * Set occurrenceremarksfreq.
     *
     * @param int $occurrenceremarksfreq
     *
     * @return Salixwordstats
     */
    public function setOccurrenceremarksfreq($occurrenceremarksfreq)
    {
        $this->occurrenceremarksfreq = $occurrenceremarksfreq;

        return $this;
    }

    /**
     * Get occurrenceremarksfreq.
     *
     * @return int
     */
    public function getOccurrenceremarksfreq()
    {
        return $this->occurrenceremarksfreq;
    }

    /**
     * Set totalcount.
     *
     * @param int $totalcount
     *
     * @return Salixwordstats
     */
    public function setTotalcount($totalcount)
    {
        $this->totalcount = $totalcount;

        return $this;
    }

    /**
     * Get totalcount.
     *
     * @return int
     */
    public function getTotalcount()
    {
        return $this->totalcount;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime|null $initialtimestamp
     *
     * @return Salixwordstats
     */
    public function setInitialtimestamp($initialtimestamp = null)
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    /**
     * Get initialtimestamp.
     *
     * @return \DateTime|null
     */
    public function getInitialtimestamp()
    {
        return $this->initialtimestamp;
    }
}
