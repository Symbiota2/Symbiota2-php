<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ExsiccatiNumbers
 *
 * @ORM\Table(name="omexsiccatinumbers", uniqueConstraints={@ORM\UniqueConstraint(name="Index_omexsiccatinumbers_unique", columns={"exsnumber", "ometid"})}, indexes={@ORM\Index(name="FK_exsiccatiTitleNumber", columns={"ometid"})})
 * @ORM\Entity(repositoryClass="App\Repository\ExsiccatiNumbersRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class ExsiccatiNumbers implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="omenid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="exsnumber", type="string", length=45)
     * @Assert\NotBlank()
     * @Assert\Length(max=45)
     */
    private $exsiccatiNumber;

    /**
     * @var \App\Entity\ExsiccatiTitles
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\ExsiccatiTitles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ometid", referencedColumnName="ometid")
     * })
     */
    private $exsiccatiTitleId;

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
     * @Assert\NotBlank()
     */
    private $initialTimestamp;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="\App\Entity\Occurrences", inversedBy="omenid")
     * @ORM\JoinTable(name="omexsiccatiocclink",
     *   joinColumns={
     *     @ORM\JoinColumn(name="omenid", referencedColumnName="omenid")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     *   }
     * )
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

    public function getExsiccatiNumber(): ?string
    {
        return $this->exsiccatiNumber;
    }

    public function setExsiccatiNumber(string $exsiccatiNumber): self
    {
        $this->exsiccatiNumber = $exsiccatiNumber;

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

    public function getExsiccatiTitleId(): ?ExsiccatiTitles
    {
        return $this->exsiccatiTitleId;
    }

    public function setExsiccatiTitleId(?ExsiccatiTitles $exsiccatiTitleId): self
    {
        $this->exsiccatiTitleId = $exsiccatiTitleId;

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
        }

        return $this;
    }

    public function removeOccurrenceId(Occurrences $occurrenceId): self
    {
        if ($this->occurrenceId->contains($occurrenceId)) {
            $this->occurrenceId->removeElement($occurrenceId);
        }

        return $this;
    }

}
