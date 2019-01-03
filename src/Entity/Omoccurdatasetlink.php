<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurdatasetlink
 *
 * @ORM\Table(name="omoccurdatasetlink", indexes={@ORM\Index(name="FK_omoccurdatasetlink_occid", columns={"occid"}), @ORM\Index(name="FK_omoccurdatasetlink_datasetid", columns={"datasetid"})})
 * @ORM\Entity(repositoryClass="App\Repository\OmoccurdatasetlinkRepository")
 */
class Omoccurdatasetlink
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

    /**
     * @var \Omoccurdatasets
     *
     * @ORM\ManyToOne(targetEntity="Omoccurdatasets")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="datasetid", referencedColumnName="datasetid")
     * })
     */
    private $datasetid;

    /**
     * @var \Omoccurrences
     *
     * @ORM\ManyToOne(targetEntity="Omoccurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     * })
     */
    private $occid;

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

    public function getDatasetid(): ?Omoccurdatasets
    {
        return $this->datasetid;
    }

    public function setDatasetid(?Omoccurdatasets $datasetid): self
    {
        $this->datasetid = $datasetid;

        return $this;
    }

    public function getOccid(): ?Omoccurrences
    {
        return $this->occid;
    }

    public function setOccid(?Omoccurrences $occid): self
    {
        $this->occid = $occid;

        return $this;
    }


}
