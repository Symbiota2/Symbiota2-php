<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Geothescounty
 *
 * @ORM\Table(name="geothescounty", indexes={@ORM\Index(name="FK_geothescounty_state_idx", columns={"stateid"}), @ORM\Index(name="FK_geothescounty_accepted_idx", columns={"acceptedid"})})
 * @ORM\Entity
 */
class Geothescounty
{
    /**
     * @var int
     *
     * @ORM\Column(name="gtcoid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $gtcoid;

    /**
     * @var string
     *
     * @ORM\Column(name="countyterm", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $countyterm;

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
     * @var \App\Entities\Geothescounty
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Geothescounty")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="acceptedid", referencedColumnName="gtcoid", nullable=true)
     * })
     */
    private $acceptedid;

    /**
     * @var \App\Entities\Geothesstateprovince
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Geothesstateprovince")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stateid", referencedColumnName="gtspid", nullable=true)
     * })
     */
    private $stateid;


    /**
     * Get gtcoid.
     *
     * @return int
     */
    public function getGtcoid()
    {
        return $this->gtcoid;
    }

    /**
     * Set countyterm.
     *
     * @param string $countyterm
     *
     * @return Geothescounty
     */
    public function setCountyterm($countyterm)
    {
        $this->countyterm = $countyterm;

        return $this;
    }

    /**
     * Get countyterm.
     *
     * @return string
     */
    public function getCountyterm()
    {
        return $this->countyterm;
    }

    /**
     * Set abbreviation.
     *
     * @param string|null $abbreviation
     *
     * @return Geothescounty
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
     * @return Geothescounty
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
     * @return Geothescounty
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
     * @return Geothescounty
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
     * @return Geothescounty
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
     * @param \App\Entities\Geothescounty|null $acceptedid
     *
     * @return Geothescounty
     */
    public function setAcceptedid(\App\Entities\Geothescounty $acceptedid = null)
    {
        $this->acceptedid = $acceptedid;

        return $this;
    }

    /**
     * Get acceptedid.
     *
     * @return \App\Entities\Geothescounty|null
     */
    public function getAcceptedid()
    {
        return $this->acceptedid;
    }

    /**
     * Set stateid.
     *
     * @param \App\Entities\Geothesstateprovince|null $stateid
     *
     * @return Geothescounty
     */
    public function setStateid(\App\Entities\Geothesstateprovince $stateid = null)
    {
        $this->stateid = $stateid;

        return $this;
    }

    /**
     * Get stateid.
     *
     * @return \App\Entities\Geothesstateprovince|null
     */
    public function getStateid()
    {
        return $this->stateid;
    }
}
