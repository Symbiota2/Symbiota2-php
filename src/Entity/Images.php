<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Images
 *
 * @ORM\Table(name="images", indexes={@ORM\Index(name="FK_images_occ", columns={"occid"}), @ORM\Index(name="Index_tid", columns={"tid"}), @ORM\Index(name="Index_images_datelastmod", columns={"InitialTimeStamp"}), @ORM\Index(name="FK_photographeruid", columns={"photographeruid"})})
 * @ORM\Entity(repositoryClass="App\Repository\ImagesRepository")
 */
class Images
{
    /**
     * @var int
     *
     * @ORM\Column(name="imgid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $imgid;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="thumbnailurl", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $thumbnailurl = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="originalurl", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $originalurl = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="archiveurl", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $archiveurl = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="photographer", type="string", length=100, nullable=true, options={"default"=NULL})
     */
    private $photographer = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagetype", type="string", length=50, nullable=true, options={"default"=NULL})
     */
    private $imagetype = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="format", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $format = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="caption", type="string", length=100, nullable=true, options={"default"=NULL})
     */
    private $caption = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="owner", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $owner = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="sourceurl", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $sourceurl = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="referenceUrl", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $referenceurl = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="copyright", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $copyright = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="rights", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $rights = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="accessrights", type="string", length=255, nullable=true, options={"default"=NULL})
     */
    private $accessrights = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="locality", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $locality = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=350, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="anatomy", type="string", length=100, nullable=true, options={"default"=NULL})
     */
    private $anatomy = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="username", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $username = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="sourceIdentifier", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $sourceidentifier = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="mediaMD5", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $mediamd5 = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="dynamicProperties", type="text", length=65535, nullable=true, options={"default"=NULL})
     */
    private $dynamicproperties = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="sortsequence", type="integer", nullable=false, options={"default"="50","unsigned"=true})
     */
    private $sortsequence = '50';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Omoccurrences
     *
     * @ORM\ManyToOne(targetEntity="Omoccurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     * })
     */
    private $occid;

    /**
     * @var \Taxa
     *
     * @ORM\ManyToOne(targetEntity="Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     * })
     */
    private $tid;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="photographeruid", referencedColumnName="uid")
     * })
     */
    private $photographeruid;

    /**
     * Constructor
     */
    public function __construct()
    {

    }

    public function getImgid(): ?int
    {
        return $this->imgid;
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

    public function getThumbnailurl(): ?string
    {
        return $this->thumbnailurl;
    }

    public function setThumbnailurl(?string $thumbnailurl): self
    {
        $this->thumbnailurl = $thumbnailurl;

        return $this;
    }

    public function getOriginalurl(): ?string
    {
        return $this->originalurl;
    }

    public function setOriginalurl(?string $originalurl): self
    {
        $this->originalurl = $originalurl;

        return $this;
    }

    public function getArchiveurl(): ?string
    {
        return $this->archiveurl;
    }

    public function setArchiveurl(?string $archiveurl): self
    {
        $this->archiveurl = $archiveurl;

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

    public function getImagetype(): ?string
    {
        return $this->imagetype;
    }

    public function setImagetype(?string $imagetype): self
    {
        $this->imagetype = $imagetype;

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

    public function getSourceurl(): ?string
    {
        return $this->sourceurl;
    }

    public function setSourceurl(?string $sourceurl): self
    {
        $this->sourceurl = $sourceurl;

        return $this;
    }

    public function getReferenceurl(): ?string
    {
        return $this->referenceurl;
    }

    public function setReferenceurl(?string $referenceurl): self
    {
        $this->referenceurl = $referenceurl;

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

    public function getAccessrights(): ?string
    {
        return $this->accessrights;
    }

    public function setAccessrights(?string $accessrights): self
    {
        $this->accessrights = $accessrights;

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

    public function getSourceidentifier(): ?string
    {
        return $this->sourceidentifier;
    }

    public function setSourceidentifier(?string $sourceidentifier): self
    {
        $this->sourceidentifier = $sourceidentifier;

        return $this;
    }

    public function getMediamd5(): ?string
    {
        return $this->mediamd5;
    }

    public function setMediamd5(?string $mediamd5): self
    {
        $this->mediamd5 = $mediamd5;

        return $this;
    }

    public function getDynamicproperties(): ?string
    {
        return $this->dynamicproperties;
    }

    public function setDynamicproperties(?string $dynamicproperties): self
    {
        $this->dynamicproperties = $dynamicproperties;

        return $this;
    }

    public function getSortsequence(): ?int
    {
        return $this->sortsequence;
    }

    public function setSortsequence(int $sortsequence): self
    {
        $this->sortsequence = $sortsequence;

        return $this;
    }

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    public function getOccid(): ?Omoccurrences
    {
        return $this->occid;
    }

    public function setOccid(?Omoccurrences $occid): self
    {
        $this->occid = $occid;

        return $this;
    }

    public function getTid(): ?Taxa
    {
        return $this->tid;
    }

    public function setTid(?Taxa $tid): self
    {
        $this->tid = $tid;

        return $this;
    }

    public function getPhotographeruid(): ?Users
    {
        return $this->photographeruid;
    }

    public function setPhotographeruid(?Users $photographeruid): self
    {
        $this->photographeruid = $photographeruid;

        return $this;
    }

}
