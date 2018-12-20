<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Uploadimagetemp
 *
 * @ORM\Table(name="uploadimagetemp", indexes={@ORM\Index(name="Index_uploadimg_dbpk", columns={"dbpk"}), @ORM\Index(name="Index_uploadimg_collid", columns={"collid"}), @ORM\Index(name="Index_uploadimg_occid", columns={"occid"}), @ORM\Index(name="Index_uploadimg_ts", columns={"initialtimestamp"})})
 * @ORM\Entity(repositoryClass="App\Repository\UploadimagetempRepository")
 */
class Uploadimagetemp
{
    /**
     * @var int
     *
     * @ORM\Column(name="upimgid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $upimgid;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tid", type="integer", nullable=true, options={"default"="NULL","unsigned"=true})
     */
    private $tid = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="thumbnailurl", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $thumbnailurl = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="originalurl", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $originalurl = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="archiveurl", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $archiveurl = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="photographer", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $photographer = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="photographeruid", type="integer", nullable=true, options={"default"="NULL","unsigned"=true})
     */
    private $photographeruid = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagetype", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $imagetype = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="format", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $format = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="caption", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $caption = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="owner", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $owner = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="occid", type="integer", nullable=true, options={"default"="NULL","unsigned"=true})
     */
    private $occid = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="collid", type="integer", nullable=true, options={"default"="NULL","unsigned"=true})
     */
    private $collid = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="dbpk", type="string", length=150, nullable=true, options={"default"="NULL"})
     */
    private $dbpk = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="specimengui", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $specimengui = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $notes = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="username", type="string", length=45, nullable=true, options={"default"="NULL"})
     */
    private $username = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="sortsequence", type="integer", nullable=true, options={"default"="NULL","unsigned"=true})
     */
    private $sortsequence = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

    public function getUpimgid(): ?int
    {
        return $this->upimgid;
    }

    public function getTid(): ?int
    {
        return $this->tid;
    }

    public function setTid(?int $tid): self
    {
        $this->tid = $tid;

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

    public function getPhotographeruid(): ?int
    {
        return $this->photographeruid;
    }

    public function setPhotographeruid(?int $photographeruid): self
    {
        $this->photographeruid = $photographeruid;

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

    public function getOccid(): ?int
    {
        return $this->occid;
    }

    public function setOccid(?int $occid): self
    {
        $this->occid = $occid;

        return $this;
    }

    public function getCollid(): ?int
    {
        return $this->collid;
    }

    public function setCollid(?int $collid): self
    {
        $this->collid = $collid;

        return $this;
    }

    public function getDbpk(): ?string
    {
        return $this->dbpk;
    }

    public function setDbpk(?string $dbpk): self
    {
        $this->dbpk = $dbpk;

        return $this;
    }

    public function getSpecimengui(): ?string
    {
        return $this->specimengui;
    }

    public function setSpecimengui(?string $specimengui): self
    {
        $this->specimengui = $specimengui;

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

    public function setInitialtimestamp(\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }


}
