<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ImageProcessorNlpFragment
 *
 * @ORM\Table(name="specprocnlpfrag", indexes={@ORM\Index(name="FK_specprocnlpfrag_spnlpid", columns={"spnlpid"})})
 * @ORM\Entity()
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class ImageProcessorNlpFragment implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="spnlpfragid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\Entity\ImageProcessorNlp
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\ImageProcessorNlp")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="spnlpid", referencedColumnName="spnlpid", nullable=false)
     * })
     */
    private $imageProcessorNlpId;

    /**
     * @var string
     *
     * @ORM\Column(name="fieldname", type="string", length=45)
     * @Assert\NotBlank()
     * @Assert\Length(max=45)
     */
    private $fieldName;

    /**
     * @var string
     *
     * @ORM\Column(name="patternmatch", type="string", length=250)
     * @Assert\NotBlank()
     * @Assert\Length(max=250)
     */
    private $patternMatch;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $notes;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortseq", type="integer", nullable=true, options={"default"="50"})
     * @Assert\Type(type="integer")
     */
    private $sortSequence = 50;

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

    public function getFieldName(): ?string
    {
        return $this->fieldName;
    }

    public function setFieldName(string $fieldName): self
    {
        $this->fieldName = $fieldName;

        return $this;
    }

    public function getPatternMatch(): ?string
    {
        return $this->patternMatch;
    }

    public function setPatternMatch(string $patternMatch): self
    {
        $this->patternMatch = $patternMatch;

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

    public function setInitialTimestamp(?\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }

    public function getImageProcessorNlpId(): ?ImageProcessorNlp
    {
        return $this->imageProcessorNlpId;
    }

    public function setImageProcessorNlpId(?ImageProcessorNlp $imageProcessorNlpId): self
    {
        $this->imageProcessorNlpId = $imageProcessorNlpId;

        return $this;
    }


}
