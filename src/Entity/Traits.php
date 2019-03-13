<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Traits
 *
 * @ORM\Table(name="tmtraits", indexes={@ORM\Index(name="FK_traits_uidmodified_idx", columns={"modifieduid"}), @ORM\Index(name="FK_traits_uidcreated_idx", columns={"createduid"}), @ORM\Index(name="traitsname", columns={"traitname"})})
 * @ORM\Entity(repositoryClass="App\Repository\TraitsRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class Traits implements ModifiedUserIdInterface, CreatedUserIdInterface, InitialTimestampInterface, ModifiedTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="traitid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="traitname", type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\Length(max=100)
     */
    private $traitName;

    /**
     * @var string
     *
     * @ORM\Column(name="traittype", type="string", length=2, options={"default"="UM"})
     * @Assert\NotBlank()
     * @Assert\Length(max=2)
     */
    private $traitType = 'UM';

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
     * @ORM\Column(name="description", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="refurl", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $referenceUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $dynamicProperties;

    /**
     * @var \App\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="modifieduid", referencedColumnName="uid")
     * })
     * @Assert\Type(type="integer")
     */
    private $modifiedUserId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modifiedTimeStamp", type="datetime", nullable=true)
     * @Assert\DateTime
     */
    private $modifiedTimestamp;

    /**
     * @var \App\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="createduid", referencedColumnName="uid")
     * })
     * @Assert\Type(type="integer")
     */
    private $createdUserId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="\App\Entity\Taxa", inversedBy="traitId")
     * @ORM\JoinTable(name="tmtraittaxalink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="traitid", referencedColumnName="traitid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     *   }
     * )
     */
    private $taxaId;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->taxaId = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTraitName(): ?string
    {
        return $this->traitName;
    }

    public function setTraitName(string $traitName): self
    {
        $this->traitName = $traitName;

        return $this;
    }

    public function getTraitType(): ?string
    {
        return $this->traitType;
    }

    public function setTraitType(string $traitType): self
    {
        $this->traitType = $traitType;

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

    public function getReferenceUrl(): ?string
    {
        return $this->referenceUrl;
    }

    public function setReferenceUrl(?string $referenceUrl): self
    {
        $this->referenceUrl = $referenceUrl;

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

    public function getDynamicProperties(): ?string
    {
        return $this->dynamicProperties;
    }

    public function setDynamicProperties(?string $dynamicProperties): self
    {
        $this->dynamicProperties = $dynamicProperties;

        return $this;
    }

    public function getModifiedTimestamp(): ?\DateTimeInterface
    {
        return $this->modifiedTimestamp;
    }

    public function setModifiedTimestamp(?\DateTimeInterface $modifiedTimestamp): ModifiedTimestampInterface
    {
        $this->modifiedTimestamp = $modifiedTimestamp;

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

    /**
     * @return Users|null
     */
    public function getCreatedUserId(): ?Users
    {
        return $this->createdUserId;
    }

    /**
     * @param UserInterface $createdUserId
     * @return CreatedUserIdInterface
     */
    public function setCreatedUserId(UserInterface $createdUserId): CreatedUserIdInterface
    {
        $this->createdUserId = $createdUserId;

        return $this;
    }

    /**
     * @return Users|null
     */
    public function getModifiedUserId(): ?Users
    {
        return $this->modifiedUserId;
    }

    /**
     * @param UserInterface $modifiedUserId
     * @return ModifiedUserIdInterface
     */
    public function setModifiedUserId(UserInterface $modifiedUserId): ModifiedUserIdInterface
    {
        $this->modifiedUserId = $modifiedUserId;

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
