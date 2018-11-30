<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Specprocnlp
 *
 * @ORM\Table(name="specprocnlp", indexes={@ORM\Index(name="FK_specprocnlp_collid", columns={"collid"})})
 * @ORM\Entity
 */
class Specprocnlp
{
    /**
     * @var int
     *
     * @ORM\Column(name="spnlpid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $spnlpid;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="sqlfrag", type="string", length=250, precision=0, scale=0, nullable=false, unique=false)
     */
    private $sqlfrag;

    /**
     * @var string|null
     *
     * @ORM\Column(name="patternmatch", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $patternmatch;

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
     * @var \App\Entities\Omcollections
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Omcollections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collid", referencedColumnName="CollID", nullable=true)
     * })
     */
    private $collid;


    /**
     * Get spnlpid.
     *
     * @return int
     */
    public function getSpnlpid()
    {
        return $this->spnlpid;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Specprocnlp
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set sqlfrag.
     *
     * @param string $sqlfrag
     *
     * @return Specprocnlp
     */
    public function setSqlfrag($sqlfrag)
    {
        $this->sqlfrag = $sqlfrag;

        return $this;
    }

    /**
     * Get sqlfrag.
     *
     * @return string
     */
    public function getSqlfrag()
    {
        return $this->sqlfrag;
    }

    /**
     * Set patternmatch.
     *
     * @param string|null $patternmatch
     *
     * @return Specprocnlp
     */
    public function setPatternmatch($patternmatch = null)
    {
        $this->patternmatch = $patternmatch;

        return $this;
    }

    /**
     * Get patternmatch.
     *
     * @return string|null
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
     * @return Specprocnlp
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
     * @return Specprocnlp
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
     * Set collid.
     *
     * @param \App\Entities\Omcollections|null $collid
     *
     * @return Specprocnlp
     */
    public function setCollid(\App\Entities\Omcollections $collid = null)
    {
        $this->collid = $collid;

        return $this;
    }

    /**
     * Get collid.
     *
     * @return \App\Entities\Omcollections|null
     */
    public function getCollid()
    {
        return $this->collid;
    }
}
