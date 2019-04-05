<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ImageTagKey
 *
 * @ORM\Table(name="imagetagkey", indexes={@ORM\Index(name="sortorder", columns={"sortorder"})})
 * @ORM\Entity()
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class ImageTagKey implements InitialTimestampInterface
{
    /**
     * @var string
     *
     * @ORM\Column(name="tagkey", type="string", length=30)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Assert\NotBlank()
     * @Assert\Length(max=30)
     */
    private $tagKey;

    /**
     * @var string
     *
     * @ORM\Column(name="shortlabel", type="string", length=30)
     * @Assert\NotBlank()
     * @Assert\Length(max=30)
     */
    private $shortLabel;

    /**
     * @var string
     *
     * @ORM\Column(name="description_en", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(max=255)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="sortorder", type="integer")
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $sortOrder;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    public function getTagKey(): ?string
    {
        return $this->tagKey;
    }

    public function getShortLabel(): ?string
    {
        return $this->shortLabel;
    }

    public function setShortLabel(string $shortLabel): self
    {
        $this->shortLabel = $shortLabel;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSortOrder(): ?int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;

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


}
