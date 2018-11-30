<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Geothesstateprovince
 *
 * @ORM\Table(name="geothesstateprovince", indexes={@ORM\Index(name="FK_geothesstate_country_idx", columns={"countryid"}), @ORM\Index(name="FK_geothesstate_accepted_idx", columns={"acceptedid"})})
 * @ORM\Entity
 */
class Geothesstateprovince
{
    /**
     * @var int
     *
     * @ORM\Column(name="gtspid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $gtspid;

    /**
     * @var string
     *
     * @ORM\Column(name="stateterm", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $stateterm;

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
     * @var \App\Entities\Geothesstateprovince
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Geothesstateprovince")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="acceptedid", referencedColumnName="gtspid", nullable=true)
     * })
     */
    private $acceptedid;

    /**
     * @var \App\Entities\Geothescountry
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Geothescountry")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="countryid", referencedColumnName="gtcid", nullable=true)
     * })
     */
    private $countryid;


    /**
     * Get gtspid.
     *
     * @return int
     */
    public function getGtspid()
    {
        return $this->gtspid;
    }

    /**
     * Set stateterm.
     *
     * @param string $stateterm
     *
     * @return Geothesstateprovince
     */
    public function setStateterm($stateterm)
    {
        $this->stateterm = $stateterm;

        return $this;
    }

    /**
     * Get stateterm.
     *
     * @return string
     */
    public function getStateterm()
    {
        return $this->stateterm;
    }

    /**
     * Set abbreviation.
     *
     * @param string|null $abbreviation
     *
     * @return Geothesstateprovince
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
     * @return Geothesstateprovince
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
     * @return Geothesstateprovince
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
     * @return Geothesstateprovince
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
     * @return Geothesstateprovince
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
     * @param \App\Entities\Geothesstateprovince|null $acceptedid
     *
     * @return Geothesstateprovince
     */
    public function setAcceptedid(\App\Entities\Geothesstateprovince $acceptedid = null)
    {
        $this->acceptedid = $acceptedid;

        return $this;
    }

    /**
     * Get acceptedid.
     *
     * @return \App\Entities\Geothesstateprovince|null
     */
    public function getAcceptedid()
    {
        return $this->acceptedid;
    }

    /**
     * Set countryid.
     *
     * @param \App\Entities\Geothescountry|null $countryid
     *
     * @return Geothesstateprovince
     */
    public function setCountryid(\App\Entities\Geothescountry $countryid = null)
    {
        $this->countryid = $countryid;

        return $this;
    }

    /**
     * Get countryid.
     *
     * @return \App\Entities\Geothescountry|null
     */
    public function getCountryid()
    {
        return $this->countryid;
    }
}
