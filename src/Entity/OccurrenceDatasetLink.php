<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * OccurrenceDatasetLink
 *
 * @ORM\Table(name="omoccurdatasetlink", indexes={@ORM\Index(name="FK_omoccurdatasetlink_occid", columns={"occid"}), @ORM\Index(name="FK_omoccurdatasetlink_datasetid", columns={"datasetid"})})
 * @ORM\Entity(repositoryClass="App\Repository\OccurrenceDatasetLinkRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class OccurrenceDatasetLink implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="ocdatlid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\Entity\Occurrences
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Occurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid", nullable=false)
     * })
     */
    private $occurrenceId;

    /**
     * @var \App\Entity\OccurrenceDatasets
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\OccurrenceDatasets")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="datasetid", referencedColumnName="datasetid", nullable=false)
     * })
     */
    private $datasetId;

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

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDatasetId(): ?OccurrenceDatasets
    {
        return $this->datasetId;
    }

    public function setDatasetId(?OccurrenceDatasets $datasetId): self
    {
        $this->datasetId = $datasetId;

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
