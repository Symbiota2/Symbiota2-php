<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Specprocessorrawlabels
 *
 * @ORM\Table(name="specprocessorrawlabels", indexes={@ORM\Index(name="FK_specproc_images", columns={"imgid"}), @ORM\Index(name="FK_specproc_occid", columns={"occid"})})
 * @ORM\Entity
 */
class Specprocessorrawlabels
{
    /**
     * @var int
     *
     * @ORM\Column(name="prlid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $prlid;

    /**
     * @var string
     *
     * @ORM\Column(name="rawstr", type="text", length=65535, precision=0, scale=0, nullable=false, unique=false)
     */
    private $rawstr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="processingvariables", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $processingvariables;

    /**
     * @var int|null
     *
     * @ORM\Column(name="score", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $score;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $source;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortsequence", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $sortsequence;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Images
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Images")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="imgid", referencedColumnName="imgid", nullable=true)
     * })
     */
    private $imgid;

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
     * Get prlid.
     *
     * @return int
     */
    public function getPrlid()
    {
        return $this->prlid;
    }

    /**
     * Set rawstr.
     *
     * @param string $rawstr
     *
     * @return Specprocessorrawlabels
     */
    public function setRawstr($rawstr)
    {
        $this->rawstr = $rawstr;

        return $this;
    }

    /**
     * Get rawstr.
     *
     * @return string
     */
    public function getRawstr()
    {
        return $this->rawstr;
    }

    /**
     * Set processingvariables.
     *
     * @param string|null $processingvariables
     *
     * @return Specprocessorrawlabels
     */
    public function setProcessingvariables($processingvariables = null)
    {
        $this->processingvariables = $processingvariables;

        return $this;
    }

    /**
     * Get processingvariables.
     *
     * @return string|null
     */
    public function getProcessingvariables()
    {
        return $this->processingvariables;
    }

    /**
     * Set score.
     *
     * @param int|null $score
     *
     * @return Specprocessorrawlabels
     */
    public function setScore($score = null)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score.
     *
     * @return int|null
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Specprocessorrawlabels
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
     * Set source.
     *
     * @param string|null $source
     *
     * @return Specprocessorrawlabels
     */
    public function setSource($source = null)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source.
     *
     * @return string|null
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set sortsequence.
     *
     * @param int|null $sortsequence
     *
     * @return Specprocessorrawlabels
     */
    public function setSortsequence($sortsequence = null)
    {
        $this->sortsequence = $sortsequence;

        return $this;
    }

    /**
     * Get sortsequence.
     *
     * @return int|null
     */
    public function getSortsequence()
    {
        return $this->sortsequence;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Specprocessorrawlabels
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
     * Set imgid.
     *
     * @param \App\Entities\Images|null $imgid
     *
     * @return Specprocessorrawlabels
     */
    public function setImgid(\App\Entities\Images $imgid = null)
    {
        $this->imgid = $imgid;

        return $this;
    }

    /**
     * Get imgid.
     *
     * @return \App\Entities\Images|null
     */
    public function getImgid()
    {
        return $this->imgid;
    }

    /**
     * Set occid.
     *
     * @param \App\Entities\Omoccurrences|null $occid
     *
     * @return Specprocessorrawlabels
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
