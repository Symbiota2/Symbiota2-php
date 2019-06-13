<?php

namespace ImageProcessor\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Core\Entity\InitialTimestampInterface;
use Media\Entity\Images;
use Occurrence\Entity\Occurrences;

/**
 * RawLabels
 *
 * @ORM\Table(name="specprocessorrawlabels", indexes={@ORM\Index(name="FK_specproc_occid", columns={"occid"}), @ORM\Index(name="FK_specproc_images", columns={"imgid"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/imageprocessor",
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class RawLabels implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="prlid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Media\Entity\Images
     *
     * @ORM\ManyToOne(targetEntity="Media\Entity\Images")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="imgid", referencedColumnName="imgid", nullable=false)
     * })
     */
    private $imageId;

    /**
     * @var \Occurrence\Entity\Occurrences
     *
     * @ORM\ManyToOne(targetEntity="Occurrence\Entity\Occurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     * })
     */
    private $occurrenceId;

    /**
     * @var string
     *
     * @ORM\Column(name="rawstr", type="text", length=65535)
     * @Assert\NotBlank()
     * @Assert\Length(max=65535)
     */
    private $rawString;

    /**
     * @var string|null
     *
     * @ORM\Column(name="processingvariables", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $processingVariables;

    /**
     * @var int|null
     *
     * @ORM\Column(name="score", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $score;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="source", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     */
    private $source;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortsequence", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $sortSequence;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRawString(): ?string
    {
        return $this->rawString;
    }

    public function setRawString(string $rawString): self
    {
        $this->rawString = $rawString;

        return $this;
    }

    public function getProcessingVariables(): ?string
    {
        return $this->processingVariables;
    }

    public function setProcessingVariables(?string $processingVariables): self
    {
        $this->processingVariables = $processingVariables;

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

    public function getSortSequence(): ?int
    {
        return $this->sortSequence;
    }

    public function setSortSequence(?int $sortSequence): self
    {
        $this->sortSequence = $sortSequence;

        return $this;
    }

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }

    public function getImageId(): ?Images
    {
        return $this->imageId;
    }

    public function setImageId(?Images $imageId): self
    {
        $this->imageId = $imageId;

        return $this;
    }

    public function getOccurrenceId(): ?Occurrences
    {
        return $this->occurrenceId;
    }

    public function setOccurrenceId(?Occurrences $occurrenceId): self
    {
        $this->occurrenceId = $occurrenceId;

        return $this;
    }


}
