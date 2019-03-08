<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OccurrenceDatasetLink
 *
 * @ORM\Table(name="omoccurdatasetlink", indexes={@ORM\Index(name="FK_omoccurdatasetlink_occid", columns={"occid"}), @ORM\Index(name="FK_omoccurdatasetlink_datasetid", columns={"datasetid"})})
 * @ORM\Entity(repositoryClass="App\Repository\OccurrenceDatasetLinkRepository")
 */
class OccurrenceDatasetLink
{
    /**
     * @var int
     *
     * @ORM\Column(name="ocdatlid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ocdatlid;

    /**
     * @var \Occurrences
     *
     * @ORM\ManyToOne(targetEntity="Occurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     * })
     */
    private $occid;

    /**
     * @var \OccurrenceDatasets
     *
     * @ORM\ManyToOne(targetEntity="OccurrenceDatasets")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="datasetid", referencedColumnName="datasetid")
     * })
     */
    private $datasetid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getOcdatlid(): ?int
    {
        return $this->ocdatlid;
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

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    public function getDatasetid(): ?OccurrenceDatasets
    {
        return $this->datasetid;
    }

    public function setDatasetid(?OccurrenceDatasets $datasetid): self
    {
        $this->datasetid = $datasetid;

        return $this;
    }

    public function getOccid(): ?Occurrences
    {
        return $this->occid;
    }

    public function setOccid(?Occurrences $occid): self
    {
        $this->occid = $occid;

        return $this;
    }


}
