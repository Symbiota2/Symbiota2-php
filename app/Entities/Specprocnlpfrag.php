<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Specprocnlpfrag
 *
 * @ORM\Table(name="specprocnlpfrag", indexes={@ORM\Index(name="FK_specprocnlpfrag_spnlpid", columns={"spnlpid"})})
 * @ORM\Entity
 */
class Specprocnlpfrag
{
    /**
     * @var int
     *
     * @ORM\Column(name="spnlpfragid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $spnlpfragid;

    /**
     * @var string
     *
     * @ORM\Column(name="fieldname", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $fieldname;

    /**
     * @var string
     *
     * @ORM\Column(name="patternmatch", type="string", length=250, precision=0, scale=0, nullable=false, unique=false)
     */
    private $patternmatch;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortseq", type="integer", precision=0, scale=0, nullable=true, options={"default"="50"}, unique=false)
     */
    private $sortseq = '50';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=true, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Specprocnlp
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Specprocnlp")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="spnlpid", referencedColumnName="spnlpid", nullable=true)
     * })
     */
    private $spnlpid;


    /**
     * Get spnlpfragid.
     *
     * @return int
     */
    public function getSpnlpfragid()
    {
        return $this->spnlpfragid;
    }

    /**
     * Set fieldname.
     *
     * @param string $fieldname
     *
     * @return Specprocnlpfrag
     */
    public function setFieldname($fieldname)
    {
        $this->fieldname = $fieldname;

        return $this;
    }

    /**
     * Get fieldname.
     *
     * @return string
     */
    public function getFieldname()
    {
        return $this->fieldname;
    }

    /**
     * Set patternmatch.
     *
     * @param string $patternmatch
     *
     * @return Specprocnlpfrag
     */
    public function setPatternmatch($patternmatch)
    {
        $this->patternmatch = $patternmatch;

        return $this;
    }

    /**
     * Get patternmatch.
     *
     * @return string
     */
    public function getPatternmatch()
    {
        return $this->patternmatch;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Specprocnlpfrag
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
     * Set sortseq.
     *
     * @param int|null $sortseq
     *
     * @return Specprocnlpfrag
     */
    public function setSortseq($sortseq = null)
    {
        $this->sortseq = $sortseq;

        return $this;
    }

    /**
     * Get sortseq.
     *
     * @return int|null
     */
    public function getSortseq()
    {
        return $this->sortseq;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime|null $initialtimestamp
     *
     * @return Specprocnlpfrag
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
     * Set spnlpid.
     *
     * @param \App\Entities\Specprocnlp|null $spnlpid
     *
     * @return Specprocnlpfrag
     */
    public function setSpnlpid(\App\Entities\Specprocnlp $spnlpid = null)
    {
        $this->spnlpid = $spnlpid;

        return $this;
    }

    /**
     * Get spnlpid.
     *
     * @return \App\Entities\Specprocnlp|null
     */
    public function getSpnlpid()
    {
        return $this->spnlpid;
    }
}
