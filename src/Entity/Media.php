<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Media
 *
 * @ORM\Table(name="media", indexes={@ORM\Index(name="FK_media_uid_idx", columns={"authoruid"}), @ORM\Index(name="FK_media_occid_idx", columns={"occid"}), @ORM\Index(name="FK_media_taxa_idx", columns={"tid"})})
 * @ORM\Entity(repositoryClass="App\Repository\MediaRepository")
 */
class Media
{
    /**
     * @var int
     *
     * @ORM\Column(name="mediaid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $mediaid;

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
     * @var \Occurrences
     *
     * @ORM\ManyToOne(targetEntity="Occurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     * })
     */
    private $occid;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=250, nullable=false)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="caption", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $caption = 'NULL';

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="authoruid", referencedColumnName="uid")
     * })
     */
    private $authoruid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="author", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $author = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="mediatype", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $mediatype = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="owner", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $owner = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="sourceurl", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $sourceurl = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="locality", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $locality = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=1000, nullable=true, options={"default"=NULL})
     */
    private $description = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="mediaMD5", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $mediamd5 = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortsequence", type="integer", nullable=true, options={"default"=NULL})
     */
    private $sortsequence = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getMediaid(): ?int
    {
        return $this->mediaid;
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

    public function getMediatype(): ?string
    {
        return $this->mediatype;
    }

    public function setMediatype(?string $mediatype): self
    {
        $this->mediatype = $mediatype;

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

    public function getMediamd5(): ?string
    {
        return $this->mediamd5;
    }

    public function setMediamd5(?string $mediamd5): self
    {
        $this->mediamd5 = $mediamd5;

        return $this;
    }

    public function getSortsequence(): ?int
    {
        return $this->sortsequence;
    }

    public function setSortsequence(?int $sortsequence): self
    {
        $this->sortsequence = $sortsequence;

        return $this;
    }

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(?\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    public function getOccid(): ?Occurrences
    {
        return $this->occid;
    }

    public function setOccid(?Occurrences $occid): self
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

    public function getAuthoruid(): ?Users
    {
        return $this->authoruid;
    }

    public function setAuthoruid(?Users $authoruid): self
    {
        $this->authoruid = $authoruid;

        return $this;
    }


}
