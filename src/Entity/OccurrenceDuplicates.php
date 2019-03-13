<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * OccurrenceDuplicates
 *
 * @ORM\Table(name="omoccurduplicates")
 * @ORM\Entity(repositoryClass="App\Repository\OccurrenceDuplicatesRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class OccurrenceDuplicates implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="duplicateid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50)
     * @Assert\NotBlank()
     * @Assert\Length(max=50)
     */
    private $title;

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
     * @var string
     *
     * @ORM\Column(name="dupeType", type="string", length=45, options={"default"="Exact Duplicate"})
     * @Assert\NotBlank()
     * @Assert\Length(max=45)
     */
    private $duplicateType = 'Exact Duplicate';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialTimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="\App\Entity\Occurrences", mappedBy="duplicateId")
     */
    private $occurrenceId;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->occurrenceId = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDuplicateType(): ?string
    {
        return $this->duplicateType;
    }

    public function setDuplicateType(string $duplicateType): self
    {
        $this->duplicateType = $duplicateType;

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
     * @return Collection|Occurrences[]
     */
    public function getOccurrenceId(): Collection
    {
        return $this->occurrenceId;
    }

    public function addOccurrenceId(Occurrences $occurrenceId): self
    {
        if (!$this->occurrenceId->contains($occurrenceId)) {
            $this->occurrenceId[] = $occurrenceId;
            $occurrenceId->addDuplicateId($this);
        }

        return $this;
    }

    public function removeOccurrenceId(Occurrences $occurrenceId): self
    {
        if ($this->occurrenceId->contains($occurrenceId)) {
            $this->occurrenceId->removeElement($occurrenceId);
            $occurrenceId->removeDuplicateId($this);
        }

        return $this;
    }

}
