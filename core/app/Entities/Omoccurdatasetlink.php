<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Omoccurdatasetlink
 *
 * @ORM\Table(name="omoccurdatasetlink", indexes={@ORM\Index(name="FK_omoccurdatasetlink_datasetid", columns={"datasetid"}), @ORM\Index(name="FK_omoccurdatasetlink_occid", columns={"occid"})})
 * @ORM\Entity
 */
class Omoccurdatasetlink
{
    /**
     * @var int
     *
     * @ORM\Column(name="ocdatlid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ocdatlid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Omoccurdatasets
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Omoccurdatasets")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="datasetid", referencedColumnName="datasetid", nullable=true)
     * })
     */
    private $datasetid;

    /**
     * @var \App\Entities\Omoccurrences
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Omoccurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid", nullable=true)
     * })
     */
    private $occid;


    /**
     * Get ocdatlid.
     *
     * @return int
     */
    public function getOcdatlid()
    {
        return $this->ocdatlid;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Omoccurdatasetlink
     */
    public function setNotes($notes = null)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes.
     *
     * @return string|null
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Omoccurdatasetlink
     */
    public function setInitialtimestamp($initialtimestamp)
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    /**
     * Get initialtimestamp.
     *
     * @return \DateTime
     */
    public function getInitialtimestamp()
    {
        return $this->initialtimestamp;
    }

    /**
     * Set datasetid.
     *
     * @param \App\Entities\Omoccurdatasets|null $datasetid
     *
     * @return Omoccurdatasetlink
     */
    public function setDatasetid(\App\Entities\Omoccurdatasets $datasetid = null)
    {
        $this->datasetid = $datasetid;

        return $this;
    }

    /**
     * Get datasetid.
     *
     * @return \App\Entities\Omoccurdatasets|null
     */
    public function getDatasetid()
    {
        return $this->datasetid;
    }

    /**
     * Set occid.
     *
     * @param \App\Entities\Omoccurrences|null $occid
     *
     * @return Omoccurdatasetlink
     */
    public function setOccid(\App\Entities\Omoccurrences $occid = null)
    {
        $this->occid = $occid;

        return $this;
    }

    /**
     * Get occid.
     *
     * @return \App\Entities\Omoccurrences|null
     */
    public function getOccid()
    {
        return $this->occid;
    }
}
