<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Uploadimagetemp
 *
 * @ORM\Table(name="uploadimagetemp", indexes={@ORM\Index(name="Index_uploadimg_occid", columns={"occid"}), @ORM\Index(name="Index_uploadimg_collid", columns={"collid"}), @ORM\Index(name="Index_uploadimg_dbpk", columns={"dbpk"}), @ORM\Index(name="Index_uploadimg_ts", columns={"initialtimestamp"})})
 * @ORM\Entity
 */
class Uploadimagetemp
{
    /**
     * @var int
     *
     * @ORM\Column(name="upimgid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $upimgid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tid", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $tid;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="thumbnailurl", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $thumbnailurl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="originalurl", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $originalurl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="archiveurl", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $archiveurl;

    /**
     * @var string|null
     *
     * @ORM\Column(name="photographer", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $photographer;

    /**
     * @var int|null
     *
     * @ORM\Column(name="photographeruid", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $photographeruid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagetype", type="string", length=50, precision=0, scale=0, nullable=true, unique=false)
     */
    private $imagetype;

    /**
     * @var string|null
     *
     * @ORM\Column(name="format", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $format;

    /**
     * @var string|null
     *
     * @ORM\Column(name="caption", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $caption;

    /**
     * @var string|null
     *
     * @ORM\Column(name="owner", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $owner;

    /**
     * @var int|null
     *
     * @ORM\Column(name="occid", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $occid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="collid", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $collid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dbpk", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $dbpk;

    /**
     * @var string|null
     *
     * @ORM\Column(name="specimengui", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $specimengui;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=255, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="username", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $username;

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortsequence", type="integer", precision=0, scale=0, nullable=true, options={"unsigned"=true}, unique=false)
     */
    private $sortsequence;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';


    /**
     * Get upimgid.
     *
     * @return int
     */
    public function getUpimgid()
    {
        return $this->upimgid;
    }

    /**
     * Set tid.
     *
     * @param int|null $tid
     *
     * @return Uploadimagetemp
     */
    public function setTid($tid = null)
    {
        $this->tid = $tid;

        return $this;
    }

    /**
     * Get tid.
     *
     * @return int|null
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Set url.
     *
     * @param string $url
     *
     * @return Uploadimagetemp
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
     * Set thumbnailurl.
     *
     * @param string|null $thumbnailurl
     *
     * @return Uploadimagetemp
     */
    public function setThumbnailurl($thumbnailurl = null)
    {
        $this->thumbnailurl = $thumbnailurl;

        return $this;
    }

    /**
     * Get thumbnailurl.
     *
     * @return string|null
     */
    public function getThumbnailurl()
    {
        return $this->thumbnailurl;
    }

    /**
     * Set originalurl.
     *
     * @param string|null $originalurl
     *
     * @return Uploadimagetemp
     */
    public function setOriginalurl($originalurl = null)
    {
        $this->originalurl = $originalurl;

        return $this;
    }

    /**
     * Get originalurl.
     *
     * @return string|null
     */
    public function getOriginalurl()
    {
        return $this->originalurl;
    }

    /**
     * Set archiveurl.
     *
     * @param string|null $archiveurl
     *
     * @return Uploadimagetemp
     */
    public function setArchiveurl($archiveurl = null)
    {
        $this->archiveurl = $archiveurl;

        return $this;
    }

    /**
     * Get archiveurl.
     *
     * @return string|null
     */
    public function getArchiveurl()
    {
        return $this->archiveurl;
    }

    /**
     * Set photographer.
     *
     * @param string|null $photographer
     *
     * @return Uploadimagetemp
     */
    public function setPhotographer($photographer = null)
    {
        $this->photographer = $photographer;

        return $this;
    }

    /**
     * Get photographer.
     *
     * @return string|null
     */
    public function getPhotographer()
    {
        return $this->photographer;
    }

    /**
     * Set photographeruid.
     *
     * @param int|null $photographeruid
     *
     * @return Uploadimagetemp
     */
    public function setPhotographeruid($photographeruid = null)
    {
        $this->photographeruid = $photographeruid;

        return $this;
    }

    /**
     * Get photographeruid.
     *
     * @return int|null
     */
    public function getPhotographeruid()
    {
        return $this->photographeruid;
    }

    /**
     * Set imagetype.
     *
     * @param string|null $imagetype
     *
     * @return Uploadimagetemp
     */
    public function setImagetype($imagetype = null)
    {
        $this->imagetype = $imagetype;

        return $this;
    }

    /**
     * Get imagetype.
     *
     * @return string|null
     */
    public function getImagetype()
    {
        return $this->imagetype;
    }

    /**
     * Set format.
     *
     * @param string|null $format
     *
     * @return Uploadimagetemp
     */
    public function setFormat($format = null)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format.
     *
     * @return string|null
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set caption.
     *
     * @param string|null $caption
     *
     * @return Uploadimagetemp
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
     * Set owner.
     *
     * @param string|null $owner
     *
     * @return Uploadimagetemp
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
     * Set occid.
     *
     * @param int|null $occid
     *
     * @return Uploadimagetemp
     */
    public function setOccid($occid = null)
    {
        $this->occid = $occid;

        return $this;
    }

    /**
     * Get occid.
     *
     * @return int|null
     */
    public function getOccid()
    {
        return $this->occid;
    }

    /**
     * Set collid.
     *
     * @param int|null $collid
     *
     * @return Uploadimagetemp
     */
    public function setCollid($collid = null)
    {
        $this->collid = $collid;

        return $this;
    }

    /**
     * Get collid.
     *
     * @return int|null
     */
    public function getCollid()
    {
        return $this->collid;
    }

    /**
     * Set dbpk.
     *
     * @param string|null $dbpk
     *
     * @return Uploadimagetemp
     */
    public function setDbpk($dbpk = null)
    {
        $this->dbpk = $dbpk;

        return $this;
    }

    /**
     * Get dbpk.
     *
     * @return string|null
     */
    public function getDbpk()
    {
        return $this->dbpk;
    }

    /**
     * Set specimengui.
     *
     * @param string|null $specimengui
     *
     * @return Uploadimagetemp
     */
    public function setSpecimengui($specimengui = null)
    {
        $this->specimengui = $specimengui;

        return $this;
    }

    /**
     * Get specimengui.
     *
     * @return string|null
     */
    public function getSpecimengui()
    {
        return $this->specimengui;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Uploadimagetemp
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
     * Set username.
     *
     * @param string|null $username
     *
     * @return Uploadimagetemp
     */
    public function setUsername($username = null)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username.
     *
     * @return string|null
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set sortsequence.
     *
     * @param int|null $sortsequence
     *
     * @return Uploadimagetemp
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
     * @param \DateTime $initialtimestamp
     *
     * @return Uploadimagetemp
     */
    public function setInitialtimestamp($initialtimestamp)
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    /**
     * Get initialtimestamp.
     *
     * @return \DateTime
     */
    public function getInitialtimestamp()
    {
        return $this->initialtimestamp;
    }
}
