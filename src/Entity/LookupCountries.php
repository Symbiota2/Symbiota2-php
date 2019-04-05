<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * LookupCountries
 *
 * @ORM\Table(name="lkupcountry", uniqueConstraints={@ORM\UniqueConstraint(name="country_unique", columns={"countryName"})}, indexes={@ORM\Index(name="Index_lkupcountry_iso3", columns={"iso3"}), @ORM\Index(name="Index_lkupcountry_iso", columns={"iso"})})
 * @ORM\Entity()
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class LookupCountries implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="countryId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="countryName", type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\Length(max=100)
     */
    private $countryName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="iso", type="string", length=2, nullable=true)
     * @Assert\Length(max=2)
     */
    private $iso;

    /**
     * @var string|null
     *
     * @ORM\Column(name="iso3", type="string", length=3, nullable=true)
     * @Assert\Length(max=3)
     */
    private $iso3;

    /**
     * @var int|null
     *
     * @ORM\Column(name="numcode", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $numericCode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountryName(): ?string
    {
        return $this->countryName;
    }

    public function setCountryName(string $countryName): self
    {
        $this->countryName = $countryName;

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

    public function getNumericCode(): ?int
    {
        return $this->numericCode;
    }

    public function setNumericCode(?int $numericCode): self
    {
        $this->numericCode = $numericCode;

        return $this;
    }

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }


}
