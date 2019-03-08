<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImageProcessorNlpFragment
 *
 * @ORM\Table(name="specprocnlpfrag", indexes={@ORM\Index(name="FK_specprocnlpfrag_spnlpid", columns={"spnlpid"})})
 * @ORM\Entity(repositoryClass="App\Repository\ImageProcessorNlpFragmentRepository")
 */
class ImageProcessorNlpFragment
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
     * @var \ImageProcessorNlp
     *
     * @ORM\ManyToOne(targetEntity="ImageProcessorNlp")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="spnlpid", referencedColumnName="spnlpid")
     * })
     */
    private $spnlpid;

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
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"=NULL})
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
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

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

    public function getSpnlpid(): ?ImageProcessorNlp
    {
        return $this->spnlpid;
    }

    public function setSpnlpid(?ImageProcessorNlp $spnlpid): self
    {
        $this->spnlpid = $spnlpid;

        return $this;
    }


}
