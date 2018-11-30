<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Geothescountry
 *
 * @ORM\Table(name="geothescountry", indexes={@ORM\Index(name="FK_geothescountry__idx", columns={"continentid"}), @ORM\Index(name="FK_geothescountry_parent_idx", columns={"acceptedid"})})
 * @ORM\Entity
 */
class Geothescountry
{
    /**
     * @var int
     *
     * @ORM\Column(name="gtcid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $gtcid;

    /**
     * @var string
     *
     * @ORM\Column(name="countryterm", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $countryterm;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abbreviation", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $abbreviation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="iso", type="string", length=2, precision=0, scale=0, nullable=true, unique=false)
     */
    private $iso;

    /**
     * @var string|null
     *
     * @ORM\Column(name="iso3", type="string", length=3, precision=0, scale=0, nullable=true, unique=false)
     */
    private $iso3;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numcode", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $numcode;

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
     * @var \App\Entities\Geothescountry
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Geothescountry")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="acceptedid", referencedColumnName="gtcid", nullable=true)
     * })
     */
    private $acceptedid;

    /**
     * @var \App\Entities\Geothescontinent
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Geothescontinent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="continentid", referencedColumnName="gtcid", nullable=true)
     * })
     */
    private $continentid;


    /**
     * Get gtcid.
     *
     * @return int
     */
    public function getGtcid()
    {
        return $this->gtcid;
    }

    /**
     * Set countryterm.
     *
     * @param string $countryterm
     *
     * @return Geothescountry
     */
    public function setCountryterm($countryterm)
    {
        $this->countryterm = $countryterm;

        return $this;
    }

    /**
     * Get countryterm.
     *
     * @return string
     */
    public function getCountryterm()
    {
        return $this->countryterm;
    }

    /**
     * Set abbreviation.
     *
     * @param string|null $abbreviation
     *
     * @return Geothescountry
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
     * Set iso.
     *
     * @param string|null $iso
     *
     * @return Geothescountry
     */
    public function setIso($iso = null)
    {
        $this->iso = $iso;

        return $this;
    }

    /**
     * Get iso.
     *
     * @return string|null
     */
    public function getIso()
    {
        return $this->iso;
    }

    /**
     * Set iso3.
     *
     * @param string|null $iso3
     *
     * @return Geothescountry
     */
    public function setIso3($iso3 = null)
    {
        $this->iso3 = $iso3;

        return $this;
    }

    /**
     * Get iso3.
     *
     * @return string|null
     */
    public function getIso3()
    {
        return $this->iso3;
    }

    /**
     * Set numcode.
     *
     * @param int|null $numcode
     *
     * @return Geothescountry
     */
    public function setNumcode($numcode = null)
    {
        $this->numcode = $numcode;

        return $this;
    }

    /**
     * Get numcode.
     *
     * @return int|null
     */
    public function getNumcode()
    {
        return $this->numcode;
    }

    /**
     * Set lookupterm.
     *
     * @param int $lookupterm
     *
     * @return Geothescountry
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
     * @return Geothescountry
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
     * @return Geothescountry
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
     * @param \App\Entities\Geothescountry|null $acceptedid
     *
     * @return Geothescountry
     */
    public function setAcceptedid(\App\Entities\Geothescountry $acceptedid = null)
    {
        $this->acceptedid = $acceptedid;

        return $this;
    }

    /**
     * Get acceptedid.
     *
     * @return \App\Entities\Geothescountry|null
     */
    public function getAcceptedid()
    {
        return $this->acceptedid;
    }

    /**
     * Set continentid.
     *
     * @param \App\Entities\Geothescontinent|null $continentid
     *
     * @return Geothescountry
     */
    public function setContinentid(\App\Entities\Geothescontinent $continentid = null)
    {
        $this->continentid = $continentid;

        return $this;
    }

    /**
     * Get continentid.
     *
     * @return \App\Entities\Geothescontinent|null
     */
    public function getContinentid()
    {
        return $this->continentid;
    }
}
