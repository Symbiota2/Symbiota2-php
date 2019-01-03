<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Geothescountry
 *
 * @ORM\Table(name="geothescountry", indexes={@ORM\Index(name="FK_geothescountry_parent_idx", columns={"acceptedid"}), @ORM\Index(name="FK_geothescountry__idx", columns={"continentid"})})
 * @ORM\Entity(repositoryClass="App\Repository\GeothescountryRepository")
 * @ApiResource
 */
class Geothescountry
{
    /**
     * @var int
     *
     * @ORM\Column(name="gtcid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $gtcid;

    /**
     * @var string
     *
     * @ORM\Column(name="countryterm", type="string", length=45, nullable=false)
     */
    private $countryterm;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abbreviation", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $abbreviation = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="iso", type="string", length=2, nullable=true, options={"default"=NULL})
     */
    private $iso = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="iso3", type="string", length=3, nullable=true, options={"default"=NULL})
     */
    private $iso3 = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="numcode", type="integer", nullable=true, options={"default"=NULL})
     */
    private $numcode = 'NULL';

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
     * @var \Geothescontinent
     *
     * @ORM\ManyToOne(targetEntity="Geothescontinent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="continentid", referencedColumnName="gtcid")
     * })
     */
    private $continentid;

    /**
     * @var \Geothescountry
     *
     * @ORM\ManyToOne(targetEntity="Geothescountry")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="acceptedid", referencedColumnName="gtcid")
     * })
     */
    private $acceptedid;

    public function getGtcid(): ?int
    {
        return $this->gtcid;
    }

    public function getCountryterm(): ?string
    {
        return $this->countryterm;
    }

    public function setCountryterm(string $countryterm): self
    {
        $this->countryterm = $countryterm;

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

    public function getIso(): ?string
    {
        return $this->iso;
    }

    public function setIso(?string $iso): self
    {
        $this->iso = $iso;

        return $this;
    }

    public function getIso3(): ?string
    {
        return $this->iso3;
    }

    public function setIso3(?string $iso3): self
    {
        $this->iso3 = $iso3;

        return $this;
    }

    public function getNumcode(): ?int
    {
        return $this->numcode;
    }

    public function setNumcode(?int $numcode): self
    {
        $this->numcode = $numcode;

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

    public function getContinentid(): ?Geothescontinent
    {
        return $this->continentid;
    }

    public function setContinentid(?Geothescontinent $continentid): self
    {
        $this->continentid = $continentid;

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
