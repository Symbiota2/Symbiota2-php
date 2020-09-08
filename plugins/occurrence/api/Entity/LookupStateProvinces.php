<?php

namespace Occurrence\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\NumericFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Core\Entity\InitialTimestampInterface;

/**
 * LookupStateProvinces
 *
 * @ORM\Table(name="lkupstateprovince", uniqueConstraints={@ORM\UniqueConstraint(name="state_index", columns={"stateName", "countryId"})}, indexes={@ORM\Index(name="index_statename", columns={"stateName"}), @ORM\Index(name="fk_country", columns={"countryId"}), @ORM\Index(name="Index_lkupstate_abbr", columns={"abbrev"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/occurrence",
 *     itemOperations={"get"},
 *     collectionOperations={"get"},
 *     attributes={"pagination_enabled"=false}
 * )
 * @ApiFilter(
 *      OrderFilter::class,
 *      properties={
 *          "stateName": "ASC"
 *      }
 * )
 * @ApiFilter(
 *     NumericFilter::class,
 *     properties={"country.id"}
 * )
 */
class LookupStateProvinces implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="stateId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Occurrence\Entity\LookupCountries
     *
     * @ORM\ManyToOne(targetEntity="Occurrence\Entity\LookupCountries")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="countryId", referencedColumnName="countryId", nullable=false)
     * })
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="stateName", type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\Length(max=100)
     */
    private $stateName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="abbrev", type="string", length=2, nullable=true)
     * @Assert\Length(max=2)
     */
    private $abbreviation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=true)
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStateName(): ?string
    {
        return $this->stateName;
    }

    public function setStateName(string $stateName): self
    {
        $this->stateName = $stateName;

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

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }

    public function getCountry(): ?LookupCountries
    {
        return $this->country;
    }

    public function setCountry(?LookupCountries $country): self
    {
        $this->country = $country;

        return $this;
    }


}
