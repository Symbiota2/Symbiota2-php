<?php

namespace CrowdSource\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Core\Entity\InitialTimestampInterface;
use Collection\Entity\Collections;

/**
 * Central
 *
 * @ORM\Table(name="omcrowdsourcecentral", uniqueConstraints={@ORM\UniqueConstraint(name="Index_omcrowdsourcecentral_collid", columns={"collid"})})
 * @ORM\Entity()
 * @ApiResource(
 *     routePrefix="/crowdsource",
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class Central implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="omcsid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Collection\Entity\Collections
     *
     * @ORM\ManyToOne(targetEntity="Collection\Entity\Collections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="collid", referencedColumnName="CollID", nullable=false)
     * })
     */
    private $collectionId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="instructions", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $instructions;

    /**
     * @var string|null
     *
     * @ORM\Column(name="trainingurl", type="string", length=500, nullable=true)
     * @Assert\Length(max=500)
     */
    private $trainingUrl;

    /**
     * @var int
     *
     * @ORM\Column(name="editorlevel", type="integer", options={"comment"="0=public, 1=public limited, 2=private"})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $editorLevel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $notes;

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

    public function getInstructions(): ?string
    {
        return $this->instructions;
    }

    public function setInstructions(?string $instructions): self
    {
        $this->instructions = $instructions;

        return $this;
    }

    public function getTrainingUrl(): ?string
    {
        return $this->trainingUrl;
    }

    public function setTrainingUrl(?string $trainingUrl): self
    {
        $this->trainingUrl = $trainingUrl;

        return $this;
    }

    public function getEditorLevel(): ?int
    {
        return $this->editorLevel;
    }

    public function setEditorLevel(int $editorLevel): self
    {
        $this->editorLevel = $editorLevel;

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
