<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Geothescontinent
 *
 * @ORM\Table(name="geothescontinent", indexes={@ORM\Index(name="FK_geothescontinent_accepted_idx", columns={"acceptedid"})})
 * @ORM\Entity
 */
class Geothescontinent
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
     * @ORM\Column(name="continentterm", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $continentterm;

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
     * @var \App\Entities\Geothescontinent
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Geothescontinent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="acceptedid", referencedColumnName="gtcid", nullable=true)
     * })
     */
    private $acceptedid;


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
     * Set continentterm.
     *
     * @param string $continentterm
     *
     * @return Geothescontinent
     */
    public function setContinentterm($continentterm)
    {
        $this->continentterm = $continentterm;

        return $this;
    }

    /**
     * Get continentterm.
     *
     * @return string
     */
    public function getContinentterm()
    {
        return $this->continentterm;
    }

    /**
     * Set abbreviation.
     *
     * @param string|null $abbreviation
     *
     * @return Geothescontinent
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
     * @return Geothescontinent
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
     * @return Geothescontinent
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
     * @return Geothescontinent
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
     * @return Geothescontinent
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
     * @param \App\Entities\Geothescontinent|null $acceptedid
     *
     * @return Geothescontinent
     */
    public function setAcceptedid(\App\Entities\Geothescontinent $acceptedid = null)
    {
        $this->acceptedid = $acceptedid;

        return $this;
    }

    /**
     * Get acceptedid.
     *
     * @return \App\Entities\Geothescontinent|null
     */
    public function getAcceptedid()
    {
        return $this->acceptedid;
    }
}
