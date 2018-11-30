<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Specprocnlpversion
 *
 * @ORM\Table(name="specprocnlpversion", indexes={@ORM\Index(name="FK_specprocnlpver_rawtext_idx", columns={"prlid"})})
 * @ORM\Entity
 */
class Specprocnlpversion
{
    /**
     * @var int
     *
     * @ORM\Column(name="nlpverid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nlpverid;

    /**
     * @var string
     *
     * @ORM\Column(name="archivestr", type="text", length=65535, precision=0, scale=0, nullable=false, unique=false)
     */
    private $archivestr;

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
     * @ORM\Column(name="source", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $source;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=true, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Specprocessorrawlabels
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Specprocessorrawlabels")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prlid", referencedColumnName="prlid", nullable=true)
     * })
     */
    private $prlid;


    /**
     * Get nlpverid.
     *
     * @return int
     */
    public function getNlpverid()
    {
        return $this->nlpverid;
    }

    /**
     * Set archivestr.
     *
     * @param string $archivestr
     *
     * @return Specprocnlpversion
     */
    public function setArchivestr($archivestr)
    {
        $this->archivestr = $archivestr;

        return $this;
    }

    /**
     * Get archivestr.
     *
     * @return string
     */
    public function getArchivestr()
    {
        return $this->archivestr;
    }

    /**
     * Set processingvariables.
     *
     * @param string|null $processingvariables
     *
     * @return Specprocnlpversion
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
     * @return Specprocnlpversion
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
     * Set source.
     *
     * @param string|null $source
     *
     * @return Specprocnlpversion
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
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Specprocnlpversion
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
     * @param \DateTime|null $initialtimestamp
     *
     * @return Specprocnlpversion
     */
    public function setInitialtimestamp($initialtimestamp = null)
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    /**
     * Get initialtimestamp.
     *
     * @return \DateTime|null
     */
    public function getInitialtimestamp()
    {
        return $this->initialtimestamp;
    }

    /**
     * Set prlid.
     *
     * @param \App\Entities\Specprocessorrawlabels|null $prlid
     *
     * @return Specprocnlpversion
     */
    public function setPrlid(\App\Entities\Specprocessorrawlabels $prlid = null)
    {
        $this->prlid = $prlid;

        return $this;
    }

    /**
     * Get prlid.
     *
     * @return \App\Entities\Specprocessorrawlabels|null
     */
    public function getPrlid()
    {
        return $this->prlid;
    }
}
