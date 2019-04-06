<?php

namespace Occurrence\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Core\Entity\InitialTimestampInterface;
use Taxa\Entity\Taxa;

/**
 * GeoIndex
 *
 * @ORM\Table(name="omoccurgeoindex", indexes={@ORM\Index(name="IDX_375D79BD52596C31", columns={"tid"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/occurrence",
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class GeoIndex implements InitialTimestampInterface
{
    /**
     * @var \Taxa\Entity\Taxa
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Taxa\Entity\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID", nullable=false)
     * })
     */
    private $taxaId;

    /**
     * @var float
     *
     * @ORM\Column(name="decimallatitude", type="float", precision=10, scale=0)
     * @ORM\Id
     * @Assert\NotBlank()
     * @Assert\Type(type="float")
     */
    private $decimalLatitude;

    /**
     * @var float
     *
     * @ORM\Column(name="decimallongitude", type="float", precision=10, scale=0)
     * @ORM\Id
     * @Assert\NotBlank()
     * @Assert\Type(type="float")
     */
    private $decimalLongitude;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getDecimalLatitude(): ?float
    {
        return $this->decimalLatitude;
    }

    public function getDecimalLongitude(): ?float
    {
        return $this->decimalLongitude;
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

    public function getTaxaId(): ?Taxa
    {
        return $this->taxaId;
    }

    public function setTaxaId(?Taxa $taxaId): self
    {
        $this->taxaId = $taxaId;

        return $this;
    }


}
