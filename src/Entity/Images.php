<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Images
 *
 * @ORM\Table(name="images", indexes={@ORM\Index(name="FK_images_occ", columns={"occid"}), @ORM\Index(name="Index_tid", columns={"tid"}), @ORM\Index(name="Index_images_datelastmod", columns={"InitialTimeStamp"}), @ORM\Index(name="FK_photographeruid", columns={"photographeruid"})})
 * @ORM\Entity(repositoryClass="App\Repository\ImagesRepository")
 * @ApiResource(
 *     itemOperations={"get"},
 *     collectionOperations={"get"}
 * )
 */
class Images implements InitialTimestampInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="imgid", type="integer", options={"unsigned"=true})
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
     * @var \App\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="\App\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="photographeruid", referencedColumnName="uid")
     * })
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
     * @ORM\Column(name="owner", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $owner;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sourceurl", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $sourceUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="referenceUrl", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $referenceUrl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="copyright", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $copyright;

    /**
     * @var string|null
     *
     * @ORM\Column(name="rights", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $rights;

    /**
     * @var string|null
     *
     * @ORM\Column(name="accessrights", type="string", length=255, nullable=true)
     * @Assert\Length(max=255)
     */
    private $accessRights;

    /**
     * @var string|null
     *
     * @ORM\Column(name="locality", type="string", length=250, nullable=true)
     * @Assert\Length(max=250)
     */
    private $locality;

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
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=350, nullable=true)
     * @Assert\Length(max=350)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="anatomy", type="string", length=100, nullable=true)
     * @Assert\Length(max=100)
     */
    private $anatomy;

    /**
     * @var string|null
     *
     * @ORM\Column(name="username", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $username;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sourceIdentifier", type="string", length=150, nullable=true)
     * @Assert\Length(max=150)
     */
    private $sourceIdentifier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mediaMD5", type="string", length=45, nullable=true)
     * @Assert\Length(max=45)
     */
    private $mediaMd5;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="text", length=65535, nullable=true)
     * @Assert\Length(max=65535)
     */
    private $dynamicProperties;

    /**
     * @var int
     *
     * @ORM\Column(name="sortsequence", type="integer", options={"default"="50","unsigned"=true})
     * @Assert\Type(type="integer")
     */
    private $sortSequence = 50;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime")
     * @Assert\DateTime
     */
    private $initialTimestamp;

    /**
     * Constructor
     */
    public function __construct()
    {

    }

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

    public function getSourceUrl(): ?string
    {
        return $this->sourceUrl;
    }

    public function setSourceUrl(?string $sourceUrl): self
    {
        $this->sourceUrl = $sourceUrl;

        return $this;
    }

    public function getReferenceUrl(): ?string
    {
        return $this->referenceUrl;
    }

    public function setReferenceUrl(?string $referenceUrl): self
    {
        $this->referenceUrl = $referenceUrl;

        return $this;
    }

    public function getCopyright(): ?string
    {
        return $this->copyright;
    }

    public function setCopyright(?string $copyright): self
    {
        $this->copyright = $copyright;

        return $this;
    }

    public function getRights(): ?string
    {
        return $this->rights;
    }

    public function setRights(?string $rights): self
    {
        $this->rights = $rights;

        return $this;
    }

    public function getAccessRights(): ?string
    {
        return $this->accessRights;
    }

    public function setAccessRights(?string $accessRights): self
    {
        $this->accessRights = $accessRights;

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

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getAnatomy(): ?string
    {
        return $this->anatomy;
    }

    public function setAnatomy(?string $anatomy): self
    {
        $this->anatomy = $anatomy;

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

    public function getSourceIdentifier(): ?string
    {
        return $this->sourceIdentifier;
    }

    public function setSourceIdentifier(?string $sourceIdentifier): self
    {
        $this->sourceIdentifier = $sourceIdentifier;

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

    public function getDynamicProperties(): ?string
    {
        return $this->dynamicProperties;
    }

    public function setDynamicProperties(?string $dynamicProperties): self
    {
        $this->dynamicProperties = $dynamicProperties;

        return $this;
    }

    public function getSortSequence(): ?int
    {
        return $this->sortSequence;
    }

    public function setSortSequence(int $sortSequence): self
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

    public function getPhotographerUserId(): ?Users
    {
        return $this->photographerUserId;
    }

    public function setPhotographerUserId(?Users $photographerUserId): self
    {
        $this->photographerUserId = $photographerUserId;

        return $this;
    }

}
