<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ImageProcessorOcrFragment
 *
 * @ORM\Table(name="specprococrfrag", indexes={@ORM\Index(name="FK_specprococrfrag_prlid_idx", columns={"prlid"}), @ORM\Index(name="Index_keyterm", columns={"keyterm"})})
 * @ORM\Entity()
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class ImageProcessorOcrFragment implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="ocrfragid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\Entity\ImageProcessorRawLabels
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\ImageProcessorRawLabels")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="prlid", referencedColumnName="prlid", nullable=false)
     * })
     */
    private $imageProcessorRawLabelId;

    /**
     * @var string
     *
     * @ORM\Column(name="firstword", type="string", length=45)
     * @Assert\NotBlank()
     * @Assert\Length(max=45)
     */
    private $firstWord;

    /**
     * @var string|null
     *
     * @ORM\Column(name="secondword", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $secondWord;

    /**
     * @var string|null
     *
     * @ORM\Column(name="keyterm", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $keyTerm;

    /**
     * @var int|null
     *
     * @ORM\Column(name="wordorder", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $wordOrder;

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

    public function getFirstWord(): ?string
    {
        return $this->firstWord;
    }

    public function setFirstWord(string $firstWord): self
    {
        $this->firstWord = $firstWord;

        return $this;
    }

    public function getSecondWord(): ?string
    {
        return $this->secondWord;
    }

    public function setSecondWord(?string $secondWord): self
    {
        $this->secondWord = $secondWord;

        return $this;
    }

    public function getKeyTerm(): ?string
    {
        return $this->keyTerm;
    }

    public function setKeyTerm(?string $keyTerm): self
    {
        $this->keyTerm = $keyTerm;

        return $this;
    }

    public function getWordOrder(): ?int
    {
        return $this->wordOrder;
    }

    public function setWordOrder(?int $wordOrder): self
    {
        $this->wordOrder = $wordOrder;

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

    public function getImageProcessorRawLabelId(): ?ImageProcessorRawLabels
    {
        return $this->imageProcessorRawLabelId;
    }

    public function setImageProcessorRawLabelId(?ImageProcessorRawLabels $imageProcessorRawLabelId): self
    {
        $this->imageProcessorRawLabelId = $imageProcessorRawLabelId;

        return $this;
    }


}
