<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * KeyDescriptions
 *
 * @ORM\Table(name="kmdescr", indexes={@ORM\Index(name="CSDescr", columns={"CID", "CS"}), @ORM\Index(name="IDX_6691F324C4FE2EBB", columns={"tid"})})
 * @ORM\Entity(repositoryClass="App\Repository\KeyDescriptionsRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class KeyDescriptions implements InitialTimestampInterface
{
    /**
     * @var \App\Entity\Taxa
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="\App\Entity\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     * })
     * @Assert\NotBlank()
     */
    private $taxaId;

    /**
     * @var \App\Entity\KeyCharacters
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="\App\Entity\KeyCharacters")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CID", referencedColumnName="cid")
     * })
     * @Assert\NotBlank()
     */
    private $characterId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Modifier", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $modifier;

    /**
     * @var string
     *
     * @ORM\Column(name="CS", type="string", length=16)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @Assert\NotBlank()
     * @Assert\Length(max=16)
     */
    private $characterState;

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
     * @var int|null
     *
     * @ORM\Column(name="PseudoTrait", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $pseudotrait;

    /**
     * @var int
     *
     * @ORM\Column(name="Frequency", type="integer", options={"default"="5","unsigned"=true,"comment"="Frequency of occurrence; 1 = rare... 5 = common"})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $frequency = 5;

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
     * @ORM\Column(name="Seq", type="integer", nullable=true)
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
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getCharacterId(): ?KeyCharacters
    {
        return $this->characterId;
    }

    public function setCharacterId(?KeyCharacters $characterId): self
    {
        $this->characterId = $characterId;

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

    public function getCharacterState(): ?string
    {
        return $this->characterState;
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

    public function getPseudotrait(): ?int
    {
        return $this->pseudotrait;
    }

    public function setPseudotrait(?int $pseudotrait): self
    {
        $this->pseudotrait = $pseudotrait;

        return $this;
    }

    public function getFrequency(): ?int
    {
        return $this->frequency;
    }

    public function setFrequency(int $frequency): self
    {
        $this->frequency = $frequency;

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
