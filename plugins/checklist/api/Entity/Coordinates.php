<?php

namespace Checklist\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Core\Entity\InitialTimestampInterface;
use Taxa\Entity\Taxa;

/**
 * Coordinates
 *
 * @ORM\Table(name="fmchklstcoordinates", uniqueConstraints={@ORM\UniqueConstraint(name="IndexUnique", columns={"clid", "tid", "decimallatitude", "decimallongitude"})}, indexes={@ORM\Index(name="FKchklsttaxalink", columns={"clid", "tid"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/checklist",
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class Coordinates implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="chklstcoordid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Checklist\Entity\Checklists
     *
     * @ORM\ManyToOne(targetEntity="Checklist\Entity\Checklists")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="clid", referencedColumnName="CLID", nullable=false)
     * })
     */
    private $checklistId;

    /**
     * @var \Taxa\Entity\Taxa
     *
     * @ORM\ManyToOne(targetEntity="Taxa\Entity\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID", nullable=false)
     * })
     */
    private $taxaId;

    /**
     * @var float
     *
     * @ORM\Column(name="decimallatitude", type="float", precision=10, scale=0)
     * @Assert\NotBlank()
     * @Assert\Type(type="float")
     */
    private $decimalLatitude;

    /**
     * @var float
     *
     * @ORM\Column(name="decimallongitude", type="float", precision=10, scale=0)
     * @Assert\NotBlank()
     * @Assert\Type(type="float")
     */
    private $decimalLongitude;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $notes;

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

    public function getChecklistId(): ?Checklists
    {
        return $this->checklistId;
    }

    public function setChecklistId(?Checklists $checklistId): self
    {
        $this->checklistId = $checklistId;

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

    public function getDecimalLatitude(): ?float
    {
        return $this->decimalLatitude;
    }

    public function setDecimalLatitude(float $decimalLatitude): self
    {
        $this->decimalLatitude = $decimalLatitude;

        return $this;
    }

    public function getDecimalLongitude(): ?float
    {
        return $this->decimalLongitude;
    }

    public function setDecimalLongitude(float $decimalLongitude): self
    {
        $this->decimalLongitude = $decimalLongitude;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

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
