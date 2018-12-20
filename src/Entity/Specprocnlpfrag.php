<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Specprocnlpfrag
 *
 * @ORM\Table(name="specprocnlpfrag", indexes={@ORM\Index(name="FK_specprocnlpfrag_spnlpid", columns={"spnlpid"})})
 * @ORM\Entity(repositoryClass="App\Repository\SpecprocnlpfragRepository")
 */
class Specprocnlpfrag
{
    /**
     * @var int
     *
     * @ORM\Column(name="spnlpfragid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $spnlpfragid;

    /**
     * @var string
     *
     * @ORM\Column(name="fieldname", type="string", length=45, nullable=false)
     */
    private $fieldname;

    /**
     * @var string
     *
     * @ORM\Column(name="patternmatch", type="string", length=250, nullable=false)
     */
    private $patternmatch;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $notes = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortseq", type="integer", nullable=true, options={"default"="50"})
     */
    private $sortseq = '50';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=true, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    /**
     * @var \Specprocnlp
     *
     * @ORM\ManyToOne(targetEntity="Specprocnlp")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="spnlpid", referencedColumnName="spnlpid")
     * })
     */
    private $spnlpid;

    public function getSpnlpfragid(): ?int
    {
        return $this->spnlpfragid;
    }

    public function getFieldname(): ?string
    {
        return $this->fieldname;
    }

    public function setFieldname(string $fieldname): self
    {
        $this->fieldname = $fieldname;

        return $this;
    }

    public function getPatternmatch(): ?string
    {
        return $this->patternmatch;
    }

    public function setPatternmatch(string $patternmatch): self
    {
        $this->patternmatch = $patternmatch;

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

    public function getSortseq(): ?int
    {
        return $this->sortseq;
    }

    public function setSortseq(?int $sortseq): self
    {
        $this->sortseq = $sortseq;

        return $this;
    }

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(?\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    public function getSpnlpid(): ?Specprocnlp
    {
        return $this->spnlpid;
    }

    public function setSpnlpid(?Specprocnlp $spnlpid): self
    {
        $this->spnlpid = $spnlpid;

        return $this;
    }


}
