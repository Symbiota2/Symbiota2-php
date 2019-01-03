<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Geothesstateprovince
 *
 * @ORM\Table(name="geothesstateprovince", indexes={@ORM\Index(name="FK_geothesstate_accepted_idx", columns={"acceptedid"}), @ORM\Index(name="FK_geothesstate_country_idx", columns={"countryid"})})
 * @ORM\Entity(repositoryClass="App\Repository\GeothesstateprovinceRepository")
 */
class Geothesstateprovince
{
    /**
     * @var int
     *
     * @ORM\Column(name="gtspid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $gtspid;

    /**
     * @var string
     *
     * @ORM\Column(name="stateterm", type="string", length=45, nullable=false)
     */
    private $stateterm;

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
     * @var \Geothescountry
     *
     * @ORM\ManyToOne(targetEntity="Geothescountry")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="countryid", referencedColumnName="gtcid")
     * })
     */
    private $countryid;

    /**
     * @var \Geothesstateprovince
     *
     * @ORM\ManyToOne(targetEntity="Geothesstateprovince")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="acceptedid", referencedColumnName="gtspid")
     * })
     */
    private $acceptedid;

    public function getGtspid(): ?int
    {
        return $this->gtspid;
    }

    public function getStateterm(): ?string
    {
        return $this->stateterm;
    }

    public function setStateterm(string $stateterm): self
    {
        $this->stateterm = $stateterm;

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

    public function getCountryid(): ?Geothescountry
    {
        return $this->countryid;
    }

    public function setCountryid(?Geothescountry $countryid): self
    {
        $this->countryid = $countryid;

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
