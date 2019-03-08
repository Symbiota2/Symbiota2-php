<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LookupStateProvinces
 *
 * @ORM\Table(name="lkupstateprovince", uniqueConstraints={@ORM\UniqueConstraint(name="state_index", columns={"stateName", "countryId"})}, indexes={@ORM\Index(name="index_statename", columns={"stateName"}), @ORM\Index(name="fk_country", columns={"countryId"}), @ORM\Index(name="Index_lkupstate_abbr", columns={"abbrev"})})
 * @ORM\Entity(repositoryClass="App\Repository\LookupStateProvincesRepository")
 */
class LookupStateProvinces
{
    /**
     * @var int
     *
     * @ORM\Column(name="stateId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $stateid;

    /**
     * @var \LookupCountries
     *
     * @ORM\ManyToOne(targetEntity="LookupCountries")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="countryId", referencedColumnName="countryId")
     * })
     */
    private $countryid;

    /**
     * @var string
     *
     * @ORM\Column(name="stateName", type="string", length=100, nullable=false)
     */
    private $statename;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abbrev", type="string", length=2, nullable=true, options={"default"=NULL})
     */
    private $abbrev = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getStateid(): ?int
    {
        return $this->stateid;
    }

    public function getStatename(): ?string
    {
        return $this->statename;
    }

    public function setStatename(string $statename): self
    {
        $this->statename = $statename;

        return $this;
    }

    public function getAbbrev(): ?string
    {
        return $this->abbrev;
    }

    public function setAbbrev(?string $abbrev): self
    {
        $this->abbrev = $abbrev;

        return $this;
    }

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    public function getCountryid(): ?LookupCountries
    {
        return $this->countryid;
    }

    public function setCountryid(?LookupCountries $countryid): self
    {
        $this->countryid = $countryid;

        return $this;
    }


}
