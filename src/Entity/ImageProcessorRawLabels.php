<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImageProcessorRawLabels
 *
 * @ORM\Table(name="specprocessorrawlabels", indexes={@ORM\Index(name="FK_specproc_occid", columns={"occid"}), @ORM\Index(name="FK_specproc_images", columns={"imgid"})})
 * @ORM\Entity(repositoryClass="App\Repository\ImageProcessorRawLabelsRepository")
 */
class ImageProcessorRawLabels
{
    /**
     * @var int
     *
     * @ORM\Column(name="prlid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $prlid;

    /**
     * @var \Images
     *
     * @ORM\ManyToOne(targetEntity="Images")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="imgid", referencedColumnName="imgid")
     * })
     */
    private $imgid;

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
     * @var string
     *
     * @ORM\Column(name="rawstr", type="text", length=65535, nullable=false)
     */
    private $rawstr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="processingvariables", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $processingvariables = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="score", type="integer", nullable=true, options={"default"=NULL})
     */
    private $score = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $source = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortsequence", type="integer", nullable=true, options={"default"=NULL})
     */
    private $sortsequence = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getPrlid(): ?int
    {
        return $this->prlid;
    }

    public function getRawstr(): ?string
    {
        return $this->rawstr;
    }

    public function setRawstr(string $rawstr): self
    {
        $this->rawstr = $rawstr;

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

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

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

    public function getSortsequence(): ?int
    {
        return $this->sortsequence;
    }

    public function setSortsequence(?int $sortsequence): self
    {
        $this->sortsequence = $sortsequence;

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

    public function getImgid(): ?Images
    {
        return $this->imgid;
    }

    public function setImgid(?Images $imgid): self
    {
        $this->imgid = $imgid;

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
