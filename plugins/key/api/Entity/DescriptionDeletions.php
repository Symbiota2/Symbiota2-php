<?php

namespace Key\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Taxa\Entity\Taxa;

/**
 * DescriptionDeletions
 *
 * @ORM\Table(name="kmdescrdeletions")
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/key",
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class DescriptionDeletions
{
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
     * @var \Key\Entity\Characters
     *
     * @ORM\ManyToOne(targetEntity="Key\Entity\Characters")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CID", referencedColumnName="cid", nullable=false)
     * })
     */
    private $characterId;

    /**
     * @var \Key\Entity\CharacterStates
     *
     * @ORM\ManyToOne(targetEntity="Key\Entity\CharacterStates")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="kmcsid", referencedColumnName="kmcsid", nullable=false)
     * })
     */
    private $characterStateId;

    /**
     * @var string
     *
     * @ORM\Column(name="CS", type="string", length=16)
     * @Assert\NotBlank()
     * @Assert\Length(max=16)
     */
    private $characterState;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Modifier", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $modifier;

    /**
     * @var float|null
     *
     * @ORM\Column(name="X", type="float", precision=15, scale=5, nullable=true)
     * @Assert\Type(type="float")
     */
    private $x;

    /**
     * @var string|null
     *
     * @ORM\Column(name="TXT", type="text", length=0, nullable=true)
     */
    private $text;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Inherited", type="string", length=50, nullable=true)
     * @Assert\Length(max=50)
     */
    private $inherited;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Source", type="string", length=100, nullable=true)
     * @Assert\Length(max=100)
     */
    private $source;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Seq", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $sequence;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Notes", type="text", length=0, nullable=true)
     */
    private $notes;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime", nullable=true)
     * @Assert\DateTime
     */
    private $initialTimestamp;

    /**
     * @var string
     *
     * @ORM\Column(name="DeletedBy", type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\Length(max=100)
     */
    private $deletedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DeletedTimeStamp", type="datetime")
     * @Assert\NotBlank()
     * @Assert\DateTime
     */
    private $deletedTimestamp;

    /**
     * @var int
     *
     * @ORM\Column(name="PK", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    public function getTaxaId(): ?Taxa
    {
        return $this->taxaId;
    }

    public function setTaxaId(?Taxa $taxaId): self
    {
        $this->taxaId = $taxaId;

        return $this;
    }

    public function getCharacterId(): ?Characters
    {
        return $this->characterId;
    }

    public function setCharacterId(?Characters $characterId): self
    {
        $this->characterId = $characterId;

        return $this;
    }

    public function getCharacterStateId(): ?CharacterStates
    {
        return $this->characterStateId;
    }

    public function setCharacterStateId(?CharacterStates $characterStateId): self
    {
        $this->characterStateId = $characterStateId;

        return $this;
    }

    public function getCharacterState(): ?string
    {
        return $this->characterState;
    }

    public function setCharacterState(string $characterState): self
    {
        $this->characterState = $characterState;

        return $this;
    }

    public function getModifier(): ?string
    {
        return $this->modifier;
    }

    public function setModifier(?string $modifier): self
    {
        $this->modifier = $modifier;

        return $this;
    }

    public function getX(): ?float
    {
        return $this->x;
    }

    public function setX(?float $x): self
    {
        $this->x = $x;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getInherited(): ?string
    {
        return $this->inherited;
    }

    public function setInherited(?string $inherited): self
    {
        $this->inherited = $inherited;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getSequence(): ?int
    {
        return $this->sequence;
    }

    public function setSequence(?int $sequence): self
    {
        $this->sequence = $sequence;

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

    public function setInitialTimestamp(?\DateTimeInterface $initialTimestamp): self
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }

    public function getDeletedBy(): ?string
    {
        return $this->deletedBy;
    }

    public function setDeletedBy(string $deletedBy): self
    {
        $this->deletedBy = $deletedBy;

        return $this;
    }

    public function getDeletedTimestamp(): ?\DateTimeInterface
    {
        return $this->deletedTimestamp;
    }

    public function setDeletedTimestamp(\DateTimeInterface $deletedTimestamp): self
    {
        $this->deletedTimestamp = $deletedTimestamp;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }


}
