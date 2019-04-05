<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CollectionCategories
 *
 * @ORM\Table(name="omcollcategories")
 * @ORM\Entity()
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class CollectionCategories implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="ccpk", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=75)
     * @Assert\Length(max=75)
     */
    private $category;

    /**
     * @var string|null
     *
     * @ORM\Column(name="icon", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $icon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="acronym", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $acronym;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $url;

    /**
     * @var int|null
     *
     * @ORM\Column(name="inclusive", type="integer", nullable=true, options={"default"="1"})
     * @Assert\Type(type="integer")
     */
    private $inclusive = 1;

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

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="\App\Entity\Collections", inversedBy="collectionCategoryId")
     * @ORM\JoinTable(name="omcollcatlink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="ccpk", referencedColumnName="ccpk")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="collid", referencedColumnName="CollID")
     *   }
     * )
     */
    private $collectionId;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->collectionId = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getAcronym(): ?string
    {
        return $this->acronym;
    }

    public function setAcronym(?string $acronym): self
    {
        $this->acronym = $acronym;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getInclusive(): ?int
    {
        return $this->inclusive;
    }

    public function setInclusive(?int $inclusive): self
    {
        $this->inclusive = $inclusive;

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

    /**
     * @return Collection|Collections[]
     */
    public function getCollectionId(): Collection
    {
        return $this->collectionId;
    }

    public function addCollectionId(Collections $collectionId): self
    {
        if (!$this->collectionId->contains($collectionId)) {
            $this->collectionId[] = $collectionId;
        }

        return $this;
    }

    public function removeCollectionId(Collections $collectionId): self
    {
        if ($this->collectionId->contains($collectionId)) {
            $this->collectionId->removeElement($collectionId);
        }

        return $this;
    }

}
