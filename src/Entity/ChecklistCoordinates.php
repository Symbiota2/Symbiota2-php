<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ChecklistCoordinates
 *
 * @ORM\Table(name="fmchklstcoordinates", uniqueConstraints={@ORM\UniqueConstraint(name="IndexUnique", columns={"clid", "tid", "decimallatitude", "decimallongitude"})}, indexes={@ORM\Index(name="FKchklsttaxalink", columns={"clid", "tid"})})
 * @ORM\Entity(repositoryClass="App\Repository\ChecklistCoordinatesRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class ChecklistCoordinates implements InitialTimestampInterface
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
     * @var int
     *
     * @ORM\Column(name="clid", type="integer", options={"unsigned"=true})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $checklistId;

    /**
     * @var int
     *
     * @ORM\Column(name="tid", type="integer", options={"unsigned"=true})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
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

    public function getChecklistId(): ?int
    {
        return $this->checklistId;
    }

    public function setChecklistId(int $checklistId): self
    {
        $this->checklistId = $checklistId;

        return $this;
    }

    public function getTaxaId(): ?int
    {
        return $this->taxaId;
    }

    public function setTaxaId(int $taxaId): self
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
