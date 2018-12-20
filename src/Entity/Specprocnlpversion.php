<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Specprocnlpversion
 *
 * @ORM\Table(name="specprocnlpversion", indexes={@ORM\Index(name="FK_specprocnlpver_rawtext_idx", columns={"prlid"})})
 * @ORM\Entity(repositoryClass="App\Repository\SpecprocnlpversionRepository")
 */
class Specprocnlpversion
{
    /**
     * @var int
     *
     * @ORM\Column(name="nlpverid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nlpverid;

    /**
     * @var string
     *
     * @ORM\Column(name="archivestr", type="text", length=65535, nullable=false)
     */
    private $archivestr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="processingvariables", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $processingvariables = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="score", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $score = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $source = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"="NULL"})
     */
    private $notes = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=true, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    /**
     * @var \Specprocessorrawlabels
     *
     * @ORM\ManyToOne(targetEntity="Specprocessorrawlabels")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prlid", referencedColumnName="prlid")
     * })
     */
    private $prlid;

    public function getNlpverid(): ?int
    {
        return $this->nlpverid;
    }

    public function getArchivestr(): ?string
    {
        return $this->archivestr;
    }

    public function setArchivestr(string $archivestr): self
    {
        $this->archivestr = $archivestr;

        return $this;
    }

    public function getProcessingvariables(): ?string
    {
        return $this->processingvariables;
    }

    public function setProcessingvariables(?string $processingvariables): self
    {
        $this->processingvariables = $processingvariables;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

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

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(?\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    public function getPrlid(): ?Specprocessorrawlabels
    {
        return $this->prlid;
    }

    public function setPrlid(?Specprocessorrawlabels $prlid): self
    {
        $this->prlid = $prlid;

        return $this;
    }


}
