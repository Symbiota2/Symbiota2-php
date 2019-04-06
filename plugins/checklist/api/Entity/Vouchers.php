<?php

namespace Checklist\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Core\Entity\InitialTimestampInterface;
use Taxa\Entity\Taxa;
use Occurrence\Entity\Occurrences;

/**
 * Vouchers
 *
 * @ORM\Table(name="fmvouchers", indexes={@ORM\Index(name="chklst_taxavouchers", columns={"TID", "CLID"}), @ORM\Index(name="IDX_6468A29340A24FBA", columns={"occid"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/checklist",
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class Vouchers implements InitialTimestampInterface
{
    /**
     * @var \Taxa\Entity\Taxa
     *
     * @ORM\ManyToOne(targetEntity="Taxa\Entity\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="TID", referencedColumnName="TID")
     * })
     */
    private $taxaId;

    /**
     * @var \Checklist\Entity\Checklists
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Checklist\Entity\Checklists")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CLID", referencedColumnName="CLID", nullable=false)
     * })
     */
    private $checklistId;

    /**
     * @var \Occurrence\Entity\Occurrences
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Occurrence\Entity\Occurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid", nullable=false)
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
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getTaxaId(): ?Taxa
    {
        return $this->taxaId;
    }

    public function setTaxaId(?int $taxaId): self
    {
        $this->taxaId = $taxaId;

        return $this;
    }

    public function getChecklistId(): ?Checklists
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
