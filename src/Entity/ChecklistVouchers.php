<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ChecklistVouchers
 *
 * @ORM\Table(name="fmvouchers", indexes={@ORM\Index(name="chklst_taxavouchers", columns={"TID", "CLID"}), @ORM\Index(name="IDX_6468A29340A24FBA", columns={"occid"})})
 * @ORM\Entity(repositoryClass="App\Repository\ChecklistVouchersRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class ChecklistVouchers implements InitialTimestampInterface
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="TID", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $taxaId;

    /**
     * @var int
     *
     * @ORM\Column(name="CLID", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $checklistId;

    /**
     * @var \App\Entity\Occurrences
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="\App\Entity\Occurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     * })
     */
    private $occurrenceId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="editornotes", type="string", length=50, nullable=true)
     * @Assert\Length(max=50)
     */
    private $editorNotes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="preferredImage", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $preferredImage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Notes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $notes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime")
     * @Assert\NotBlank()
     */
    private $initialTimestamp;

    public function getTaxaId(): ?int
    {
        return $this->taxaId;
    }

    public function setTaxaId(?int $taxaId): self
    {
        $this->taxaId = $taxaId;

        return $this;
    }

    public function getChecklistId(): ?int
    {
        return $this->checklistId;
    }

    public function getEditorNotes(): ?string
    {
        return $this->editorNotes;
    }

    public function setEditorNotes(?string $editorNotes): self
    {
        $this->editorNotes = $editorNotes;

        return $this;
    }

    public function getPreferredImage(): ?int
    {
        return $this->preferredImage;
    }

    public function setPreferredImage(?int $preferredImage): self
    {
        $this->preferredImage = $preferredImage;

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

    public function getOccurrenceId(): ?Occurrences
    {
        return $this->occurrenceId;
    }

    public function setOccurrenceId(?Occurrences $occurrenceId): self
    {
        $this->occurrenceId = $occurrenceId;

        return $this;
    }


}
