<?php

namespace Key\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Core\Entity\InitialTimestampInterface;
use Taxa\Entity\Taxa;

/**
 * Characters
 *
 * @ORM\Table(name="kmcharacters", indexes={@ORM\Index(name="FK_charheading_idx", columns={"hid"}), @ORM\Index(name="Index_sort", columns={"sortsequence"}), @ORM\Index(name="Index_charname", columns={"charname"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/key",
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class Characters implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="cid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="charname", type="string", length=150)
     * @Assert\NotBlank()
     * @Assert\Length(max=150)
     */
    private $characterName;

    /**
     * @var string
     *
     * @ORM\Column(name="chartype", type="string", length=2, options={"default"="UM"})
     * @Assert\NotBlank()
     * @Assert\Length(max=2)
     */
    private $characterType = 'UM';

    /**
     * @var string
     *
     * @ORM\Column(name="defaultlang", type="string", length=45, options={"default"="English"})
     * @Assert\NotBlank()
     * @Assert\Length(max=45)
     */
    private $defaultLanguage = 'English';

    /**
     * @var int
     *
     * @ORM\Column(name="difficultyrank", type="smallint", options={"default"="1","unsigned"=true})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $difficultyRank = 1;

    /**
     * @var \Key\Entity\CharacterHeading
     *
     * @ORM\ManyToOne(targetEntity="Key\Entity\CharacterHeading")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hid", referencedColumnName="hid")
     * })
     * @Assert\NotBlank()
     */
    private $characterHeadingId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="units", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $units;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="helpurl", type="string", length=500, nullable=true)
     * @Assert\Length(max=500)
     */
    private $helpUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="enteredby", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $enteredBy;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortsequence", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $sortSequence;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="display", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $display;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Taxa\Entity\Taxa")
     * @ORM\JoinTable(name="kmchartaxalink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="CID", referencedColumnName="cid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     *   }
     * )
     */
    private $taxaId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Key\Entity\CharacterStates", inversedBy="characterDependence")
     * @ORM\JoinTable(name="kmchardependence",
     *   joinColumns={
     *     @ORM\JoinColumn(name="CID", referencedColumnName="cid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="kmcsid", referencedColumnName="kmcsid")
     *   }
     * )
     */
    private $characterStateDependence;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->languageId = new \Doctrine\Common\Collections\ArrayCollection();
        $this->taxaId = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCharacterName(): ?string
    {
        return $this->characterName;
    }

    public function setCharacterName(string $characterName): self
    {
        $this->characterName = $characterName;

        return $this;
    }

    public function getCharacterType(): ?string
    {
        return $this->characterType;
    }

    public function setCharacterType(string $characterType): self
    {
        $this->characterType = $characterType;

        return $this;
    }

    public function getDefaultLanguage(): ?string
    {
        return $this->defaultLanguage;
    }

    public function setDefaultLanguage(string $defaultLanguage): self
    {
        $this->defaultLanguage = $defaultLanguage;

        return $this;
    }

    public function getDifficultyRank(): ?int
    {
        return $this->difficultyRank;
    }

    public function setDifficultyRank(int $difficultyRank): self
    {
        $this->difficultyRank = $difficultyRank;

        return $this;
    }

    public function getUnits(): ?string
    {
        return $this->units;
    }

    public function setUnits(?string $units): self
    {
        $this->units = $units;

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

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getHelpUrl(): ?string
    {
        return $this->helpUrl;
    }

    public function setHelpUrl(?string $helpUrl): self
    {
        $this->helpUrl = $helpUrl;

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

    public function getDisplay(): ?string
    {
        return $this->display;
    }

    public function setDisplay(?string $display): self
    {
        $this->display = $display;

        return $this;
    }

    public function getCharacterHeadingId(): ?CharacterHeading
    {
        return $this->characterHeadingId;
    }

    public function setCharacterHeadingId(?CharacterHeading $characterHeadingId): self
    {
        $this->characterHeadingId = $characterHeadingId;

        return $this;
    }

    /**
     * @return Collection|CharacterStates[]
     */
    public function getCharacterStateDependence(): Collection
    {
        return $this->characterStateDependence;
    }

    public function addCharacterStateDependence(CharacterStates $characterStateDependence): self
    {
        if (!$this->characterStateDependence->contains($characterStateDependence)) {
            $this->characterStateDependence[] = $characterStateDependence;
        }

        return $this;
    }

    public function removeCharacterStateDependence(CharacterStates $characterStateDependence): self
    {
        if ($this->characterStateDependence->contains($characterStateDependence)) {
            $this->characterStateDependence->removeElement($characterStateDependence);
        }

        return $this;
    }

    /**
     * @return Collection|Taxa[]
     */
    public function getTaxaId(): Collection
    {
        return $this->taxaId;
    }

    public function addTaxaId(Taxa $taxaId): self
    {
        if (!$this->taxaId->contains($taxaId)) {
            $this->taxaId[] = $taxaId;
        }

        return $this;
    }

    public function removeTaxaId(Taxa $taxaId): self
    {
        if ($this->taxaId->contains($taxaId)) {
            $this->taxaId->removeElement($taxaId);
        }

        return $this;
    }

}
