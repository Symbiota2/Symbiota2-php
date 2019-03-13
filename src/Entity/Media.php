<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Media
 *
 * @ORM\Table(name="media", indexes={@ORM\Index(name="FK_media_uid_idx", columns={"authoruid"}), @ORM\Index(name="FK_media_occid_idx", columns={"occid"}), @ORM\Index(name="FK_media_taxa_idx", columns={"tid"})})
 * @ORM\Entity(repositoryClass="App\Repository\MediaRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class Media implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="mediaid", type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \App\Entity\Taxa
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     * })
     * @Assert\Type(type="integer")
     */
    private $taxaId;

    /**
     * @var \App\Entity\Occurrences
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Occurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     * })
     * @Assert\Type(type="integer")
     */
    private $occurrenceId;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=250)
     * @Assert\NotBlank()
     * @Assert\Length(max=250)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="caption", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $caption;

    /**
     * @var \App\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="authoruid", referencedColumnName="uid")
     * })
     * @Assert\Type(type="integer")
     */
    private $authoruId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="author", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $author;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mediatype", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $mediaType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="owner", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $owner;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sourceurl", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $sourceUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="locality", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $locality;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=1000, nullable=true)
     * @Assert\Length(max=1000)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mediaMD5", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $mediaMd5;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortsequence", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $sortSequence;

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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getCaption(): ?string
    {
        return $this->caption;
    }

    public function setCaption(?string $caption): self
    {
        $this->caption = $caption;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getMediaType(): ?string
    {
        return $this->mediaType;
    }

    public function setMediaType(?string $mediaType): self
    {
        $this->mediaType = $mediaType;

        return $this;
    }

    public function getOwner(): ?string
    {
        return $this->owner;
    }

    public function setOwner(?string $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getSourceUrl(): ?string
    {
        return $this->sourceUrl;
    }

    public function setSourceUrl(?string $sourceUrl): self
    {
        $this->sourceUrl = $sourceUrl;

        return $this;
    }

    public function getLocality(): ?string
    {
        return $this->locality;
    }

    public function setLocality(?string $locality): self
    {
        $this->locality = $locality;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    public function getMediaMd5(): ?string
    {
        return $this->mediaMd5;
    }

    public function setMediaMd5(?string $mediaMd5): self
    {
        $this->mediaMd5 = $mediaMd5;

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

    public function getOccurrenceId(): ?Occurrences
    {
        return $this->occurrenceId;
    }

    public function setOccurrenceId(?Occurrences $occurrenceId): self
    {
        $this->occurrenceId = $occurrenceId;

        return $this;
    }

    public function getTaxaId(): ?Taxa
    {
        return $this->taxaId;
    }

    public function setTaxaId(?Taxa $taxaId): self
    {
        $this->taxaId = $taxaId;

        return $this;
    }

    public function getAuthoruId(): ?Users
    {
        return $this->authoruId;
    }

    public function setAuthoruId(?Users $authoruId): self
    {
        $this->authoruId = $authoruId;

        return $this;
    }


}
