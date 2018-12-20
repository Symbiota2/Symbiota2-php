<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Geothescounty
 *
 * @ORM\Table(name="geothescounty", indexes={@ORM\Index(name="FK_geothescounty_accepted_idx", columns={"acceptedid"}), @ORM\Index(name="FK_geothescounty_state_idx", columns={"stateid"})})
 * @ORM\Entity(repositoryClass="App\Repository\GeothescountyRepository")
 */
class Geothescounty
{
    /**
     * @var int
     *
     * @ORM\Column(name="gtcoid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $gtcoid;

    /**
     * @var string
     *
     * @ORM\Column(name="countyterm", type="string", length=45, nullable=false)
     */
    private $countyterm;

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
     * @var \Geothesstateprovince
     *
     * @ORM\ManyToOne(targetEntity="Geothesstateprovince")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stateid", referencedColumnName="gtspid")
     * })
     */
    private $stateid;

    /**
     * @var \Geothescounty
     *
     * @ORM\ManyToOne(targetEntity="Geothescounty")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="acceptedid", referencedColumnName="gtcoid")
     * })
     */
    private $acceptedid;

    public function getGtcoid(): ?int
    {
        return $this->gtcoid;
    }

    public function getCountyterm(): ?string
    {
        return $this->countyterm;
    }

    public function setCountyterm(string $countyterm): self
    {
        $this->countyterm = $countyterm;

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

    public function getStateid(): ?Geothesstateprovince
    {
        return $this->stateid;
    }

    public function setStateid(?Geothesstateprovince $stateid): self
    {
        $this->stateid = $stateid;

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
