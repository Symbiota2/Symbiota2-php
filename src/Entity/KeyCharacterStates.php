<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * KeyCharacterStates
 *
 * @ORM\Table(name="kmcs", uniqueConstraints={@ORM\UniqueConstraint(name="FK_cidclid_id", columns={"cid", "cs"})}, indexes={@ORM\Index(name="FK_cs_chars", columns={"cid"})})
 * @ORM\Entity(repositoryClass="App\Repository\KeyCharacterStatesRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class KeyCharacterStates implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="kmcsid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\Entity\KeyCharacters
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\KeyCharacters")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cid", referencedColumnName="cid")
     * })
     * @Assert\NotBlank()
     */
    private $characterId;

    /**
     * @var string
     *
     * @ORM\Column(name="cs", type="string", length=16)
     * @Assert\NotBlank()
     * @Assert\Length(max=16)
     */
    private $characterState;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CharStateName", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $characterStateName;

    /**
     * @var bool
     *
     * @ORM\Column(name="Implicit", type="integer", options={"default"="0"})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $implicit = 0;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Notes", type="text", length=0, nullable=true)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Description", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="IllustrationUrl", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $illustrationUrl;

    /**
     * @var int|null
     *
     * @ORM\Column(name="StateID", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $stateId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="SortSequence", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $sortSequence;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="EnteredBy", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $enteredBy;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="\App\Entity\KeyCharacters", mappedBy="characterStateDependence")
     */
    private $characterDependence;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCharacterStateName(): ?string
    {
        return $this->characterStateName;
    }

    public function setCharacterStateName(?string $characterStateName): self
    {
        $this->characterStateName = $characterStateName;

        return $this;
    }

    public function getImplicit(): ?bool
    {
        return $this->implicit;
    }

    public function setImplicit(bool $implicit): self
    {
        $this->implicit = $implicit;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIllustrationUrl(): ?string
    {
        return $this->illustrationUrl;
    }

    public function setIllustrationUrl(?string $illustrationUrl): self
    {
        $this->illustrationUrl = $illustrationUrl;

        return $this;
    }

    public function getStateId(): ?int
    {
        return $this->stateId;
    }

    public function setStateId(?int $stateId): self
    {
        $this->stateId = $stateId;

        return $this;
    }

    public function getSortSequence(): ?int
    {
        return $this->sortSequence;
    }

    public function setSortSequence(?int $sortSequence): self
    {
        $this->sortSequence = $sortSequence;

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

    public function getEnteredBy(): ?string
    {
        return $this->enteredBy;
    }

    public function setEnteredBy(?string $enteredBy): self
    {
        $this->enteredBy = $enteredBy;

        return $this;
    }

    public function getCharacterId(): ?KeyCharacters
    {
        return $this->characterId;
    }

    public function setCharacterId(?KeyCharacters $characterId): self
    {
        $this->characterId = $characterId;

        return $this;
    }

    /**
     * @return Collection|KeyCharacters[]
     */
    public function getCharacterDependence(): Collection
    {
        return $this->characterDependence;
    }

    public function addCharacterDependence(KeyCharacters $characterDependence): self
    {
        if (!$this->characterDependence->contains($characterDependence)) {
            $this->characterDependence[] = $characterDependence;
            $characterDependence->addCharacterStateDependence($this);
        }

        return $this;
    }

    public function removeCharacterDependence(KeyCharacters $characterDependence): self
    {
        if ($this->characterDependence->contains($characterDependence)) {
            $this->characterDependence->removeElement($characterDependence);
            $characterDependence->removeCharacterStateDependence($this);
        }

        return $this;
    }
}
