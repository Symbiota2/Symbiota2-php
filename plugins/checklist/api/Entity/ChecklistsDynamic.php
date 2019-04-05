<?php

namespace Checklist\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\InitialTimestampInterface;
use App\Entity\Taxa;

/**
 * ChecklistsDynamic
 *
 * @ORM\Table(name="fmdynamicchecklists")
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/checklist",
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class ChecklistsDynamic implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="dynclid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     * @Assert\Length(max=50)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="details", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $details;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=45, options={"default"="DynamicList"})
     * @Assert\NotBlank()
     * @Assert\Length(max=45)
     */
    private $type = 'DynamicList';

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
     * @ORM\Column(name="expiration", type="datetime")
     * @Assert\NotBlank()
     * @Assert\DateTime
     */
    private $expiration;

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
     * @ORM\ManyToMany(targetEntity="App\Entity\Taxa")
     * @ORM\JoinTable(name="fmdyncltaxalink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="dynclid", referencedColumnName="dynclid")
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(?string $details): self
    {
        $this->details = $details;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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

    public function getExpiration(): ?\DateTimeInterface
    {
        return $this->expiration;
    }

    public function setExpiration(\DateTimeInterface $expiration): self
    {
        $this->expiration = $expiration;

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
