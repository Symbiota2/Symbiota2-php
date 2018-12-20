<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Geothescontinent
 *
 * @ORM\Table(name="geothescontinent", indexes={@ORM\Index(name="FK_geothescontinent_accepted_idx", columns={"acceptedid"})})
 * @ORM\Entity(repositoryClass="App\Repository\GeothescontinentRepository")
 */
class Geothescontinent
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
     * @ORM\Column(name="continentterm", type="string", length=45, nullable=false)
     */
    private $continentterm;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abbreviation", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $abbreviation = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="code", type="string", length=45, nullable=true, options={"default"="NULL"})
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
     * @ORM\Column(name="footprintWKT", type="text", length=65535, nullable=true, options={"default"="NULL"})
     */
    private $footprintwkt = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=true, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    /**
     * @var \Geothescontinent
     *
     * @ORM\ManyToOne(targetEntity="Geothescontinent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="acceptedid", referencedColumnName="gtcid")
     * })
     */
    private $acceptedid;

    public function getGtcid(): ?int
    {
        return $this->gtcid;
    }

    public function getContinentterm(): ?string
    {
        return $this->continentterm;
    }

    public function setContinentterm(string $continentterm): self
    {
        $this->continentterm = $continentterm;

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
