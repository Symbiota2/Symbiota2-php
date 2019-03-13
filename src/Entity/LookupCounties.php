<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * LookupCounties
 *
 * @ORM\Table(name="lkupcounty", uniqueConstraints={@ORM\UniqueConstraint(name="unique_county", columns={"stateId", "countyName"})}, indexes={@ORM\Index(name="index_countyname", columns={"countyName"}), @ORM\Index(name="fk_stateprovince_lkupcounty", columns={"stateId"})})
 * @ORM\Entity(repositoryClass="App\Repository\LookupCountiesRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class LookupCounties implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="countyId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\Entity\LookupStateProvinces
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\LookupStateProvinces")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="stateId", referencedColumnName="stateId")
     * })
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $stateProvinceId;

    /**
     * @var string
     *
     * @ORM\Column(name="countyName", type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\Length(max=100)
     */
    private $countyName;

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

    public function getCountyName(): ?string
    {
        return $this->countyName;
    }

    public function setCountyName(string $countyName): self
    {
        $this->countyName = $countyName;

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
