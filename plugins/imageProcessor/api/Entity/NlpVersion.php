<?php

namespace ImageProcessor\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Core\Entity\InitialTimestampInterface;

/**
 * NlpVersion
 *
 * @ORM\Table(name="specprocnlpversion", indexes={@ORM\Index(name="FK_specprocnlpver_rawtext_idx", columns={"prlid"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/imageprocessor",
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class NlpVersion implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="nlpverid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \ImageProcessor\Entity\RawLabels
     *
     * @ORM\ManyToOne(targetEntity="ImageProcessor\Entity\RawLabels")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prlid", referencedColumnName="prlid", nullable=false)
     * })
     */
    private $imageProcessorRawLabelId;

    /**
     * @var string
     *
     * @ORM\Column(name="archivestr", type="text", length=65535)
     * @Assert\NotBlank()
     * @Assert\Length(max=65535)
     */
    private $archiveString;

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
     * @ORM\Column(name="source", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     */
    private $source;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $notes;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArchiveString(): ?string
    {
        return $this->archiveString;
    }

    public function setArchiveString(string $archiveString): self
    {
        $this->archiveString = $archiveString;

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

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(?\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }

    public function getImageProcessorRawLabelId(): ?RawLabels
    {
        return $this->imageProcessorRawLabelId;
    }

    public function setImageProcessorRawLabelId(?RawLabels $imageProcessorRawLabelId): self
    {
        $this->imageProcessorRawLabelId = $imageProcessorRawLabelId;

        return $this;
    }


}
