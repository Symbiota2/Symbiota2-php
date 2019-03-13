<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TaxaAuthorities
 *
 * @ORM\Table(name="taxauthority")
 * @ORM\Entity(repositoryClass="App\Repository\TaxaAuthoritiesRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class TaxaAuthorities implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="taxauthid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="isprimary", type="integer", options={"unsigned"=true})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $isPrimary;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45)
     * @Assert\NotBlank()
     * @Assert\Length(max=45)
     */
    private $name;

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
     * @ORM\Column(name="editors", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     */
    private $editors;

    /**
     * @var string|null
     *
     * @ORM\Column(name="contact", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $contact;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     * @Assert\Email()
     * @Assert\Length(max=100)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $notes;

    /**
     * @var int
     *
     * @ORM\Column(name="isactive", type="integer", options={"default"="1","unsigned"=true})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $isActive = 1;

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
     * @ORM\ManyToMany(targetEntity="\App\Entity\Taxa", mappedBy="taxaAuthorityId")
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

    public function getIsPrimary(): ?int
    {
        return $this->isPrimary;
    }

    public function setIsPrimary(int $isPrimary): self
    {
        $this->isPrimary = $isPrimary;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getEditors(): ?string
    {
        return $this->editors;
    }

    public function setEditors(?string $editors): self
    {
        $this->editors = $editors;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(?string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

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

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getIsActive(): ?int
    {
        return $this->isActive;
    }

    public function setIsActive(int $isActive): self
    {
        $this->isActive = $isActive;

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
            $taxaId->addTaxaAuthorityId($this);
        }

        return $this;
    }

    public function removeTaxaId(Taxa $taxaId): self
    {
        if ($this->taxaId->contains($taxaId)) {
            $this->taxaId->removeElement($taxaId);
            $taxaId->removeTaxaAuthorityId($this);
        }

        return $this;
    }

}
