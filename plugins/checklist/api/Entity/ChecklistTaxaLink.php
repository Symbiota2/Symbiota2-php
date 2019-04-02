<?php

namespace Checklist\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\InitialTimestampInterface;
use App\Entity\Taxa;

/**
 * ChecklistTaxaLink
 *
 * @ORM\Table(name="fmchklsttaxalink", uniqueConstraints={@ORM\UniqueConstraint(name="FK_clidtidmorph_id", columns={"tid", "CLID", "morphospecies"})}, indexes={@ORM\Index(name="FK_chklsttaxalink_cid", columns={"CLID"})})
 * @ORM\Entity(repositoryClass="App\Repository\ChecklistTaxaLinkRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class ChecklistTaxaLink implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="cltlid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\Entity\Taxa
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID", nullable=false)
     * })
     */
    private $taxaId;

    /**
     * @var \Checklist\Entity\Checklists
     *
     * @ORM\ManyToOne(targetEntity="\Checklist\Entity\Checklists")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CLID", referencedColumnName="CLID", nullable=false)
     * })
     */
    private $checklistId;

    /**
     * @var string
     *
     * @ORM\Column(name="morphospecies", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $morphoSpecies;

    /**
     * @var string|null
     *
     * @ORM\Column(name="familyoverride", type="string", length=50, nullable=true)
     * @Assert\Length(max=50)
     */
    private $familyOverride;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Habitat", type="string", length=450, nullable=true)
     * @Assert\Length(max=450)
     */
    private $habitat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Abundance", type="string", length=50, nullable=true)
     * @Assert\Length(max=50)
     */
    private $abundance;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Notes", type="string", length=2000, nullable=true)
     * @Assert\Length(max=2000)
     */
    private $notes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="explicitExclude", type="smallint", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $explicitExclude;

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=450, nullable=true)
     * @Assert\Length(max=450)
     */
    private $source;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Nativity", type="string", length=50, nullable=true, options={"comment"="native, introducted"})
     * @Assert\Length(max=50)
     */
    private $nativity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Endemic", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $endemic;

    /**
     * @var string|null
     *
     * @ORM\Column(name="invasive", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $invasive;

    /**
     * @var string|null
     *
     * @ORM\Column(name="internalnotes", type="string", length=450, nullable=true)
     * @Assert\Length(max=450)
     */
    private $internalNotes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $dynamicProperties;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getChecklistId(): ?Checklists
    {
        return $this->checklistId;
    }

    public function setChecklistId(?Checklists $checklistId): self
    {
        $this->checklistId = $checklistId;

        return $this;
    }

    public function getMorphoSpecies(): ?string
    {
        return $this->morphoSpecies;
    }

    public function setMorphoSpecies(string $morphoSpecies): self
    {
        $this->morphoSpecies = $morphoSpecies;

        return $this;
    }

    public function getFamilyOverride(): ?string
    {
        return $this->familyOverride;
    }

    public function setFamilyOverride(?string $familyOverride): self
    {
        $this->familyOverride = $familyOverride;

        return $this;
    }

    public function getHabitat(): ?string
    {
        return $this->habitat;
    }

    public function setHabitat(?string $habitat): self
    {
        $this->habitat = $habitat;

        return $this;
    }

    public function getAbundance(): ?string
    {
        return $this->abundance;
    }

    public function setAbundance(?string $abundance): self
    {
        $this->abundance = $abundance;

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

    public function getExplicitExclude(): ?int
    {
        return $this->explicitExclude;
    }

    public function setExplicitExclude(?int $explicitExclude): self
    {
        $this->explicitExclude = $explicitExclude;

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

    public function getNativity(): ?string
    {
        return $this->nativity;
    }

    public function setNativity(?string $nativity): self
    {
        $this->nativity = $nativity;

        return $this;
    }

    public function getEndemic(): ?string
    {
        return $this->endemic;
    }

    public function setEndemic(?string $endemic): self
    {
        $this->endemic = $endemic;

        return $this;
    }

    public function getInvasive(): ?string
    {
        return $this->invasive;
    }

    public function setInvasive(?string $invasive): self
    {
        $this->invasive = $invasive;

        return $this;
    }

    public function getInternalNotes(): ?string
    {
        return $this->internalNotes;
    }

    public function setInternalNotes(?string $internalNotes): self
    {
        $this->internalNotes = $internalNotes;

        return $this;
    }

    public function getDynamicProperties(): ?string
    {
        return $this->dynamicProperties;
    }

    public function setDynamicProperties(?string $dynamicProperties): self
    {
        $this->dynamicProperties = $dynamicProperties;

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
