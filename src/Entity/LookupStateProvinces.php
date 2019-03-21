<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * LookupStateProvinces
 *
 * @ORM\Table(name="lkupstateprovince", uniqueConstraints={@ORM\UniqueConstraint(name="state_index", columns={"stateName", "countryId"})}, indexes={@ORM\Index(name="index_statename", columns={"stateName"}), @ORM\Index(name="fk_country", columns={"countryId"}), @ORM\Index(name="Index_lkupstate_abbr", columns={"abbrev"})})
 * @ORM\Entity(repositoryClass="App\Repository\LookupStateProvincesRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
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
     * @var \App\Entity\LookupCountries
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\LookupCountries")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="countryId", referencedColumnName="countryId")
     * })
     * @Assert\NotBlank()
     */
    private $countryId;

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
     * @ORM\Column(name="initialtimestamp", type="datetime")
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

    public function getCountryId(): ?LookupCountries
    {
        return $this->countryId;
    }

    public function setCountryId(?LookupCountries $countryId): self
    {
        $this->countryId = $countryId;

        return $this;
    }


}
