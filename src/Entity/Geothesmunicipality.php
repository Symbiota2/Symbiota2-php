<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Geothesmunicipality
 *
 * @ORM\Table(name="geothesmunicipality", indexes={@ORM\Index(name="FK_geothesmunicipality_accepted_idx", columns={"acceptedid"}), @ORM\Index(name="FK_geothesmunicipality_county_idx", columns={"countyid"})})
 * @ORM\Entity(repositoryClass="App\Repository\GeothesmunicipalityRepository")
 */
class Geothesmunicipality
{
    /**
     * @var int
     *
     * @ORM\Column(name="gtmid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $gtmid;

    /**
     * @var string
     *
     * @ORM\Column(name="municipalityterm", type="string", length=45, nullable=false)
     */
    private $municipalityterm;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abbreviation", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $abbreviation = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="code", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $code = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="lookupterm", type="integer", nullable=false, options={"default"="1"})
     */
    private $lookupterm = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="footprintWKT", type="text", length=65535, nullable=true, options={"default"=NULL})
     */
    private $footprintwkt = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Geothescounty
     *
     * @ORM\ManyToOne(targetEntity="Geothescounty")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="countyid", referencedColumnName="gtcoid")
     * })
     */
    private $countyid;

    /**
     * @var \Geothesmunicipality
     *
     * @ORM\ManyToOne(targetEntity="Geothesmunicipality")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="acceptedid", referencedColumnName="gtmid")
     * })
     */
    private $acceptedid;

    public function getGtmid(): ?int
    {
        return $this->gtmid;
    }

    public function getMunicipalityterm(): ?string
    {
        return $this->municipalityterm;
    }

    public function setMunicipalityterm(string $municipalityterm): self
    {
        $this->municipalityterm = $municipalityterm;

        return $this;
    }

    public function getAbbreviation(): ?string
    {
        return $this->abbreviation;
    }

    public function setAbbreviation(?string $abbreviation): self
    {
        $this->abbreviation = $abbreviation;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getLookupterm(): ?int
    {
        return $this->lookupterm;
    }

    public function setLookupterm(int $lookupterm): self
    {
        $this->lookupterm = $lookupterm;

        return $this;
    }

    public function getFootprintwkt(): ?string
    {
        return $this->footprintwkt;
    }

    public function setFootprintwkt(?string $footprintwkt): self
    {
        $this->footprintwkt = $footprintwkt;

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

    public function getCountyid(): ?Geothescounty
    {
        return $this->countyid;
    }

    public function setCountyid(?Geothescounty $countyid): self
    {
        $this->countyid = $countyid;

        return $this;
    }

    public function getAcceptedid(): ?self
    {
        return $this->acceptedid;
    }

    public function setAcceptedid(?self $acceptedid): self
    {
        $this->acceptedid = $acceptedid;

        return $this;
    }


}
