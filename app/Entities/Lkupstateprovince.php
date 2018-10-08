<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lkupstateprovince
 *
 * @ORM\Table(name="lkupstateprovince", uniqueConstraints={@ORM\UniqueConstraint(name="state_index", columns={"stateName", "countryId"})}, indexes={@ORM\Index(name="fk_country", columns={"countryId"}), @ORM\Index(name="index_statename", columns={"stateName"}), @ORM\Index(name="Index_lkupstate_abbr", columns={"abbrev"})})
 * @ORM\Entity
 */
class Lkupstateprovince
{
    /**
     * @var int
     *
     * @ORM\Column(name="stateId", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $stateid;

    /**
     * @var string
     *
     * @ORM\Column(name="stateName", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $statename;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abbrev", type="string", length=2, precision=0, scale=0, nullable=true, unique=false)
     */
    private $abbrev;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Lkupcountry
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Lkupcountry")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="countryId", referencedColumnName="countryId", nullable=true)
     * })
     */
    private $countryid;


    /**
     * Get stateid.
     *
     * @return int
     */
    public function getStateid()
    {
        return $this->stateid;
    }

    /**
     * Set statename.
     *
     * @param string $statename
     *
     * @return Lkupstateprovince
     */
    public function setStatename($statename)
    {
        $this->statename = $statename;

        return $this;
    }

    /**
     * Get statename.
     *
     * @return string
     */
    public function getStatename()
    {
        return $this->statename;
    }

    /**
     * Set abbrev.
     *
     * @param string|null $abbrev
     *
     * @return Lkupstateprovince
     */
    public function setAbbrev($abbrev = null)
    {
        $this->abbrev = $abbrev;

        return $this;
    }

    /**
     * Get abbrev.
     *
     * @return string|null
     */
    public function getAbbrev()
    {
        return $this->abbrev;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Lkupstateprovince
     */
    public function setInitialtimestamp($initialtimestamp)
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    /**
     * Get initialtimestamp.
     *
     * @return \DateTime
     */
    public function getInitialtimestamp()
    {
        return $this->initialtimestamp;
    }

    /**
     * Set countryid.
     *
     * @param \App\Entities\Lkupcountry|null $countryid
     *
     * @return Lkupstateprovince
     */
    public function setCountryid(\App\Entities\Lkupcountry $countryid = null)
    {
        $this->countryid = $countryid;

        return $this;
    }

    /**
     * Get countryid.
     *
     * @return \App\Entities\Lkupcountry|null
     */
    public function getCountryid()
    {
        return $this->countryid;
    }
}
