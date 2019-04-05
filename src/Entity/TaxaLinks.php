<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TaxaLinks
 *
 * @ORM\Table(name="taxalinks", indexes={@ORM\Index(name="Index_unique_taxalinks", columns={"tid", "url"})})
 * @ORM\Entity()
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class TaxaLinks implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="tlid", type="integer", options={"unsigned"=true})
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
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=500)
     * @Assert\NotBlank()
     * @Assert\Length(max=500)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\Length(max=100)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sourceIdentifier", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $sourceIdentifier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="owner", type="string", length=100, nullable=true)
     * @Assert\Length(max=100)
     */
    private $owner;

    /**
     * @var string|null
     *
     * @ORM\Column(name="icon", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $icon;

    /**
     * @var int|null
     *
     * @ORM\Column(name="inherit", type="integer", nullable=true, options={"default"="1"})
     * @Assert\Type(type="integer")
     */
    private $inherit = 1;

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
     * @ORM\Column(name="sortsequence", type="integer", options={"default"="50","unsigned"=true})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $sortSequence = 50;

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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSourceIdentifier(): ?string
    {
        return $this->sourceIdentifier;
    }

    public function setSourceIdentifier(?string $sourceIdentifier): self
    {
        $this->sourceIdentifier = $sourceIdentifier;

        return $this;
    }

    public function getOwner(): ?string
    {
        return $this->owner;
    }

    public function setOwner(?string $owner): self
    {
        $this->owner = $owner;

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

    public function getInherit(): ?int
    {
        return $this->inherit;
    }

    public function setInherit(?int $inherit): self
    {
        $this->inherit = $inherit;

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

    public function getSortSequence(): ?int
    {
        return $this->sortSequence;
    }

    public function setSortSequence(int $sortSequence): self
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
