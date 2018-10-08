<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lkupcountry
 *
 * @ORM\Table(name="lkupcountry", uniqueConstraints={@ORM\UniqueConstraint(name="country_unique", columns={"countryName"})}, indexes={@ORM\Index(name="Index_lkupcountry_iso", columns={"iso"}), @ORM\Index(name="Index_lkupcountry_iso3", columns={"iso3"})})
 * @ORM\Entity
 */
class Lkupcountry
{
    /**
     * @var int
     *
     * @ORM\Column(name="countryId", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $countryid;

    /**
     * @var string
     *
     * @ORM\Column(name="countryName", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $countryname;

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
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';


    /**
     * Get countryid.
     *
     * @return int
     */
    public function getCountryid()
    {
        return $this->countryid;
    }

    /**
     * Set countryname.
     *
     * @param string $countryname
     *
     * @return Lkupcountry
     */
    public function setCountryname($countryname)
    {
        $this->countryname = $countryname;

        return $this;
    }

    /**
     * Get countryname.
     *
     * @return string
     */
    public function getCountryname()
    {
        return $this->countryname;
    }

    /**
     * Set iso.
     *
     * @param string|null $iso
     *
     * @return Lkupcountry
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
     * @return Lkupcountry
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
     * @return Lkupcountry
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
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Lkupcountry
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
}
