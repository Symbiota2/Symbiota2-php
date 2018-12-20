<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lkupcountry
 *
 * @ORM\Table(name="lkupcountry", uniqueConstraints={@ORM\UniqueConstraint(name="country_unique", columns={"countryName"})}, indexes={@ORM\Index(name="Index_lkupcountry_iso3", columns={"iso3"}), @ORM\Index(name="Index_lkupcountry_iso", columns={"iso"})})
 * @ORM\Entity(repositoryClass="App\Repository\LkupcountryRepository")
 */
class Lkupcountry
{
    /**
     * @var int
     *
     * @ORM\Column(name="countryId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $countryid;

    /**
     * @var string
     *
     * @ORM\Column(name="countryName", type="string", length=100, nullable=false)
     */
    private $countryname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="iso", type="string", length=2, nullable=true, options={"default"="NULL"})
     */
    private $iso = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="iso3", type="string", length=3, nullable=true, options={"default"="NULL"})
     */
    private $iso3 = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="numcode", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $numcode = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    public function getCountryid(): ?int
    {
        return $this->countryid;
    }

    public function getCountryname(): ?string
    {
        return $this->countryname;
    }

    public function setCountryname(string $countryname): self
    {
        $this->countryname = $countryname;

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

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }


}
