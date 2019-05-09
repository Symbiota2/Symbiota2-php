<?php

namespace Occurrence\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Core\Entity\InitialTimestampInterface;

/**
 * LookupMunicipalities
 *
 * @ORM\Table(name="lkupmunicipality", uniqueConstraints={@ORM\UniqueConstraint(name="unique_municipality", columns={"stateId", "municipalityName"})}, indexes={@ORM\Index(name="index_municipalityname", columns={"municipalityName"}), @ORM\Index(name="fk_stateprovince", columns={"stateId"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/occurrence",
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class LookupMunicipalities implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="municipalityId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Occurrence\Entity\LookupStateProvinces
     *
     * @ORM\ManyToOne(targetEntity="Occurrence\Entity\LookupStateProvinces")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stateId", referencedColumnName="stateId", nullable=false)
     * })
     */
    private $stateProvinceId;

    /**
     * @var string
     *
     * @ORM\Column(name="municipalityName", type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\Length(max=100)
     */
    private $municipalityName;

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

    public function getMunicipalityName(): ?string
    {
        return $this->municipalityName;
    }

    public function setMunicipalityName(string $municipalityName): self
    {
        $this->municipalityName = $municipalityName;

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

    public function getStateProvinceId(): ?LookupStateProvinces
    {
        return $this->stateProvinceId;
    }

    public function setStateProvinceId(?LookupStateProvinces $stateProvinceId): self
    {
        $this->stateProvinceId = $stateProvinceId;

        return $this;
    }


}
