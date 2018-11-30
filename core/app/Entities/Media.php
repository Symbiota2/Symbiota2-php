<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Media
 *
 * @ORM\Table(name="media", indexes={@ORM\Index(name="FK_media_taxa_idx", columns={"tid"}), @ORM\Index(name="FK_media_occid_idx", columns={"occid"}), @ORM\Index(name="FK_media_uid_idx", columns={"authoruid"})})
 * @ORM\Entity
 */
class Media
{
    /**
     * @var int
     *
     * @ORM\Column(name="mediaid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $mediaid;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=250, precision=0, scale=0, nullable=false, unique=false)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="caption", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $caption;

    /**
     * @var string|null
     *
     * @ORM\Column(name="author", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $author;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mediatype", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $mediatype;

    /**
     * @var string|null
     *
     * @ORM\Column(name="owner", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $owner;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sourceurl", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $sourceurl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="locality", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $locality;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=1000, precision=0, scale=0, nullable=true, unique=false)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mediaMD5", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $mediamd5;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortsequence", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $sortsequence;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=true, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Omoccurrences
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Omoccurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid", nullable=true)
     * })
     */
    private $occid;

    /**
     * @var \App\Entities\Taxa
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="tid", nullable=true)
     * })
     */
    private $tid;

    /**
     * @var \App\Entities\User
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="authoruid", referencedColumnName="uid", nullable=true)
     * })
     */
    private $authoruid;


    /**
     * Get mediaid.
     *
     * @return int
     */
    public function getMediaid()
    {
        return $this->mediaid;
    }

    /**
     * Set url.
     *
     * @param string $url
     *
     * @return Media
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set caption.
     *
     * @param string|null $caption
     *
     * @return Media
     */
    public function setCaption($caption = null)
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * Get caption.
     *
     * @return string|null
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Set author.
     *
     * @param string|null $author
     *
     * @return Media
     */
    public function setAuthor($author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author.
     *
     * @return string|null
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set mediatype.
     *
     * @param string|null $mediatype
     *
     * @return Media
     */
    public function setMediatype($mediatype = null)
    {
        $this->mediatype = $mediatype;

        return $this;
    }

    /**
     * Get mediatype.
     *
     * @return string|null
     */
    public function getMediatype()
    {
        return $this->mediatype;
    }

    /**
     * Set owner.
     *
     * @param string|null $owner
     *
     * @return Media
     */
    public function setOwner($owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner.
     *
     * @return string|null
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set sourceurl.
     *
     * @param string|null $sourceurl
     *
     * @return Media
     */
    public function setSourceurl($sourceurl = null)
    {
        $this->sourceurl = $sourceurl;

        return $this;
    }

    /**
     * Get sourceurl.
     *
     * @return string|null
     */
    public function getSourceurl()
    {
        return $this->sourceurl;
    }

    /**
     * Set locality.
     *
     * @param string|null $locality
     *
     * @return Media
     */
    public function setLocality($locality = null)
    {
        $this->locality = $locality;

        return $this;
    }

    /**
     * Get locality.
     *
     * @return string|null
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return Media
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Media
     */
    public function setNotes($notes = null)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes.
     *
     * @return string|null
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set mediamd5.
     *
     * @param string|null $mediamd5
     *
     * @return Media
     */
    public function setMediamd5($mediamd5 = null)
    {
        $this->mediamd5 = $mediamd5;

        return $this;
    }

    /**
     * Get mediamd5.
     *
     * @return string|null
     */
    public function getMediamd5()
    {
        return $this->mediamd5;
    }

    /**
     * Set sortsequence.
     *
     * @param int|null $sortsequence
     *
     * @return Media
     */
    public function setSortsequence($sortsequence = null)
    {
        $this->sortsequence = $sortsequence;

        return $this;
    }

    /**
     * Get sortsequence.
     *
     * @return int|null
     */
    public function getSortsequence()
    {
        return $this->sortsequence;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime|null $initialtimestamp
     *
     * @return Media
     */
    public function setInitialtimestamp($initialtimestamp = null)
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    /**
     * Get initialtimestamp.
     *
     * @return \DateTime|null
     */
    public function getInitialtimestamp()
    {
        return $this->initialtimestamp;
    }

    /**
     * Set occid.
     *
     * @param \App\Entities\Omoccurrences|null $occid
     *
     * @return Media
     */
    public function setOccid(\App\Entities\Omoccurrences $occid = null)
    {
        $this->occid = $occid;

        return $this;
    }

    /**
     * Get occid.
     *
     * @return \App\Entities\Omoccurrences|null
     */
    public function getOccid()
    {
        return $this->occid;
    }

    /**
     * Set tid.
     *
     * @param \App\Entities\Taxa|null $tid
     *
     * @return Media
     */
    public function setTid(\App\Entities\Taxa $tid = null)
    {
        $this->tid = $tid;

        return $this;
    }

    /**
     * Get tid.
     *
     * @return \App\Entities\Taxa|null
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Set authoruid.
     *
     * @param \App\Entities\User|null $authoruid
     *
     * @return Media
     */
    public function setAuthoruid(\App\Entities\User $authoruid = null)
    {
        $this->authoruid = $authoruid;

        return $this;
    }

    /**
     * Get authoruid.
     *
     * @return \App\Entities\User|null
     */
    public function getAuthoruid()
    {
        return $this->authoruid;
    }
}
