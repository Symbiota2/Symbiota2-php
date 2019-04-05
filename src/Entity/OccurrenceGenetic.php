<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * OccurrenceGenetic
 *
 * @ORM\Table(name="omoccurgenetic", indexes={@ORM\Index(name="FK_omoccurgenetic", columns={"occid"}), @ORM\Index(name="INDEX_omoccurgenetic_name", columns={"resourcename"})})
 * @ORM\Entity()
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class OccurrenceGenetic implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="idoccurgenetic", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\Entity\Occurrences
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Occurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid", nullable=false)
     * })
     */
    private $occurrenceId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="identifier", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     */
    private $identifier;

    /**
     * @var string
     *
     * @ORM\Column(name="resourcename", type="string", length=150)
     * @Assert\NotBlank()
     * @Assert\Length(max=150)
     */
    private $resourceName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="locus", type="string", length=500, nullable=true)
     * @Assert\Length(max=500)
     */
    private $locus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="resourceurl", type="string", length=500, nullable=true)
     * @Assert\Length(max=500)
     */
    private $resourceUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
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

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    public function setIdentifier(?string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function getResourceName(): ?string
    {
        return $this->resourceName;
    }

    public function setResourceName(string $resourceName): self
    {
        $this->resourceName = $resourceName;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getLocus(): ?string
    {
        return $this->locus;
    }

    public function setLocus(?string $locus): self
    {
        $this->locus = $locus;

        return $this;
    }

    public function getResourceUrl(): ?string
    {
        return $this->resourceUrl;
    }

    public function setResourceUrl(?string $resourceUrl): self
    {
        $this->resourceUrl = $resourceUrl;

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
