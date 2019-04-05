<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ImageProcessorNlp
 *
 * @ORM\Table(name="specprocnlp", indexes={@ORM\Index(name="FK_specprocnlp_collid", columns={"collid"})})
 * @ORM\Entity()
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class ImageProcessorNlp implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="spnlpid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45)
     * @Assert\NotBlank()
     * @Assert\Length(max=45)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="sqlfrag", type="string", length=250)
     * @Assert\NotBlank()
     * @Assert\Length(max=250)
     */
    private $sqlFragment;

    /**
     * @var string|null
     *
     * @ORM\Column(name="patternmatch", type="string", length=250, nullable=true)
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
     * @var \App\Entity\Collections
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Collections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collid", referencedColumnName="CollID", nullable=false)
     * })
     */
    private $collectionId;

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSqlFragment(): ?string
    {
        return $this->sqlFragment;
    }

    public function setSqlFragment(string $sqlFragment): self
    {
        $this->sqlFragment = $sqlFragment;

        return $this;
    }

    public function getPatternMatch(): ?string
    {
        return $this->patternMatch;
    }

    public function setPatternMatch(?string $patternMatch): self
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

    public function getInitialTimestamp(): ?\DateTimeInterface
    {
        return $this->initialTimestamp;
    }

    public function setInitialTimestamp(\DateTimeInterface $initialTimestamp): InitialTimestampInterface
    {
        $this->initialTimestamp = $initialTimestamp;

        return $this;
    }

    public function getCollectionId(): ?Collections
    {
        return $this->collectionId;
    }

    public function setCollectionId(?Collections $collectionId): self
    {
        $this->collectionId = $collectionId;

        return $this;
    }


}
