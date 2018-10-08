<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Geothesmunicipality
 *
 * @ORM\Table(name="geothesmunicipality", indexes={@ORM\Index(name="FK_geothesmunicipality_county_idx", columns={"countyid"}), @ORM\Index(name="FK_geothesmunicipality_accepted_idx", columns={"acceptedid"})})
 * @ORM\Entity
 */
class Geothesmunicipality
{
    /**
     * @var int
     *
     * @ORM\Column(name="gtmid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $gtmid;

    /**
     * @var string
     *
     * @ORM\Column(name="municipalityterm", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $municipalityterm;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abbreviation", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $abbreviation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="code", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $code;

    /**
     * @var int
     *
     * @ORM\Column(name="lookupterm", type="integer", precision=0, scale=0, nullable=false, options={"default"="1"}, unique=false)
     */
    private $lookupterm = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="footprintWKT", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $footprintwkt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=true, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Geothesmunicipality
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Geothesmunicipality")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="acceptedid", referencedColumnName="gtmid", nullable=true)
     * })
     */
    private $acceptedid;

    /**
     * @var \App\Entities\Geothescounty
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Geothescounty")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="countyid", referencedColumnName="gtcoid", nullable=true)
     * })
     */
    private $countyid;


    /**
     * Get gtmid.
     *
     * @return int
     */
    public function getGtmid()
    {
        return $this->gtmid;
    }

    /**
     * Set municipalityterm.
     *
     * @param string $municipalityterm
     *
     * @return Geothesmunicipality
     */
    public function setMunicipalityterm($municipalityterm)
    {
        $this->municipalityterm = $municipalityterm;

        return $this;
    }

    /**
     * Get municipalityterm.
     *
     * @return string
     */
    public function getMunicipalityterm()
    {
        return $this->municipalityterm;
    }

    /**
     * Set abbreviation.
     *
     * @param string|null $abbreviation
     *
     * @return Geothesmunicipality
     */
    public function setAbbreviation($abbreviation = null)
    {
        $this->abbreviation = $abbreviation;

        return $this;
    }

    /**
     * Get abbreviation.
     *
     * @return string|null
     */
    public function getAbbreviation()
    {
        return $this->abbreviation;
    }

    /**
     * Set code.
     *
     * @param string|null $code
     *
     * @return Geothesmunicipality
     */
    public function setCode($code = null)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code.
     *
     * @return string|null
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set lookupterm.
     *
     * @param int $lookupterm
     *
     * @return Geothesmunicipality
     */
    public function setLookupterm($lookupterm)
    {
        $this->lookupterm = $lookupterm;

        return $this;
    }

    /**
     * Get lookupterm.
     *
     * @return int
     */
    public function getLookupterm()
    {
        return $this->lookupterm;
    }

    /**
     * Set footprintwkt.
     *
     * @param string|null $footprintwkt
     *
     * @return Geothesmunicipality
     */
    public function setFootprintwkt($footprintwkt = null)
    {
        $this->footprintwkt = $footprintwkt;

        return $this;
    }

    /**
     * Get footprintwkt.
     *
     * @return string|null
     */
    public function getFootprintwkt()
    {
        return $this->footprintwkt;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime|null $initialtimestamp
     *
     * @return Geothesmunicipality
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

    /**
     * Set acceptedid.
     *
     * @param \App\Entities\Geothesmunicipality|null $acceptedid
     *
     * @return Geothesmunicipality
     */
    public function setAcceptedid(\App\Entities\Geothesmunicipality $acceptedid = null)
    {
        $this->acceptedid = $acceptedid;

        return $this;
    }

    /**
     * Get acceptedid.
     *
     * @return \App\Entities\Geothesmunicipality|null
     */
    public function getAcceptedid()
    {
        return $this->acceptedid;
    }

    /**
     * Set countyid.
     *
     * @param \App\Entities\Geothescounty|null $countyid
     *
     * @return Geothesmunicipality
     */
    public function setCountyid(\App\Entities\Geothescounty $countyid = null)
    {
        $this->countyid = $countyid;

        return $this;
    }

    /**
     * Get countyid.
     *
     * @return \App\Entities\Geothescounty|null
     */
    public function getCountyid()
    {
        return $this->countyid;
    }
}
