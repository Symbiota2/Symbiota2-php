<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImageProcessorNlp
 *
 * @ORM\Table(name="specprocnlp", indexes={@ORM\Index(name="FK_specprocnlp_collid", columns={"collid"})})
 * @ORM\Entity(repositoryClass="App\Repository\ImageProcessorNlpRepository")
 */
class ImageProcessorNlp
{
    /**
     * @var int
     *
     * @ORM\Column(name="spnlpid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $spnlpid;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="sqlfrag", type="string", length=250, nullable=false)
     */
    private $sqlfrag;

    /**
     * @var string|null
     *
     * @ORM\Column(name="patternmatch", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $patternmatch = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var \Collections
     *
     * @ORM\ManyToOne(targetEntity="Collections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collid", referencedColumnName="CollID")
     * })
     */
    private $collid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getSpnlpid(): ?int
    {
        return $this->spnlpid;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSqlfrag(): ?string
    {
        return $this->sqlfrag;
    }

    public function setSqlfrag(string $sqlfrag): self
    {
        $this->sqlfrag = $sqlfrag;

        return $this;
    }

    public function getPatternmatch(): ?string
    {
        return $this->patternmatch;
    }

    public function setPatternmatch(?string $patternmatch): self
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

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    public function getCollid(): ?Collections
    {
        return $this->collid;
    }

    public function setCollid(?Collections $collid): self
    {
        $this->collid = $collid;

        return $this;
    }


}
