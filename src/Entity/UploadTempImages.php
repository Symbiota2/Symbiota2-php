<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * UploadTempImages
 *
 * @ORM\Table(name="uploadimagetemp", indexes={@ORM\Index(name="Index_uploadimg_dbpk", columns={"dbpk"}), @ORM\Index(name="Index_uploadimg_collid", columns={"collid"}), @ORM\Index(name="Index_uploadimg_occid", columns={"occid"}), @ORM\Index(name="Index_uploadimg_ts", columns={"initialtimestamp"})})
 * @ORM\Entity(repositoryClass="App\Repository\UploadTempImagesRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class UploadTempImages implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="upimgid", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tid", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $taxaId;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(max=255)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="thumbnailurl", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $thumbnailUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="originalurl", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $originalUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="archiveurl", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $archiveUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="photographer", type="string", length=100, nullable=true)
     * @Assert\Length(max=100)
     */
    private $photographer;

    /**
     * @var int|null
     *
     * @ORM\Column(name="photographeruid", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $photographerUserId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagetype", type="string", length=50, nullable=true)
     * @Assert\Length(max=50)
     */
    private $imageType;

    /**
     * @var string|null
     *
     * @ORM\Column(name="format", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $format;

    /**
     * @var string|null
     *
     * @ORM\Column(name="caption", type="string", length=100, nullable=true)
     * @Assert\Length(max=100)
     */
    private $caption;

    /**
     * @var string|null
     *
     * @ORM\Column(name="owner", type="string", length=100, nullable=true)
     * @Assert\Length(max=100)
     */
    private $owner;

    /**
     * @var int|null
     *
     * @ORM\Column(name="occid", type="integer", nullable=true, options={"unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $occurrenceId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="collid", type="integer", options={"unsigned"=true})
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     */
    private $collectionId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dbpk", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     */
    private $sourcePrimaryKey;

    /**
     * @var string|null
     *
     * @ORM\Column(name="specimengui", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $occurrenceGuid;

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
     * @ORM\Column(name="username", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $username;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortsequence", type="integer", nullable=true, options={"unsigned"=true})
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

    public function getTaxaId(): ?Taxa
    {
        return $this->taxaId;
    }

    public function setTaxaId(?int $taxaId): self
    {
        $this->taxaId = $taxaId;

        return $this;
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

    public function getThumbnailUrl(): ?string
    {
        return $this->thumbnailUrl;
    }

    public function setThumbnailUrl(?string $thumbnailUrl): self
    {
        $this->thumbnailUrl = $thumbnailUrl;

        return $this;
    }

    public function getOriginalUrl(): ?string
    {
        return $this->originalUrl;
    }

    public function setOriginalUrl(?string $originalUrl): self
    {
        $this->originalUrl = $originalUrl;

        return $this;
    }

    public function getArchiveUrl(): ?string
    {
        return $this->archiveUrl;
    }

    public function setArchiveUrl(?string $archiveUrl): self
    {
        $this->archiveUrl = $archiveUrl;

        return $this;
    }

    public function getPhotographer(): ?string
    {
        return $this->photographer;
    }

    public function setPhotographer(?string $photographer): self
    {
        $this->photographer = $photographer;

        return $this;
    }

    public function getPhotographerUserId(): ?int
    {
        return $this->photographerUserId;
    }

    public function setPhotographerUserId(?int $photographerUserId): self
    {
        $this->photographerUserId = $photographerUserId;

        return $this;
    }

    public function getImageType(): ?string
    {
        return $this->imageType;
    }

    public function setImageType(?string $imageType): self
    {
        $this->imageType = $imageType;

        return $this;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(?string $format): self
    {
        $this->format = $format;

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

    public function getOwner(): ?string
    {
        return $this->owner;
    }

    public function setOwner(?string $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getOccurrenceId(): ?int
    {
        return $this->occurrenceId;
    }

    public function setOccurrenceId(?int $occurrenceId): self
    {
        $this->occurrenceId = $occurrenceId;

        return $this;
    }

    public function getCollectionId(): ?int
    {
        return $this->collectionId;
    }

    public function setCollectionId(?int $collectionId): self
    {
        $this->collectionId = $collectionId;

        return $this;
    }

    public function getSourcePrimaryKey(): ?string
    {
        return $this->sourcePrimaryKey;
    }

    public function setSourcePrimaryKey(?string $sourcePrimaryKey): self
    {
        $this->sourcePrimaryKey = $sourcePrimaryKey;

        return $this;
    }

    public function getOccurrenceGuid(): ?string
    {
        return $this->occurrenceGuid;
    }

    public function setOccurrenceGuid(?string $occurrenceGuid): self
    {
        $this->occurrenceGuid = $occurrenceGuid;

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

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

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


}
