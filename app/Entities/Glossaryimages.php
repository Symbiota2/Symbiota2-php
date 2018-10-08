<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Glossaryimages
 *
 * @ORM\Table(name="glossaryimages", indexes={@ORM\Index(name="FK_glossaryimages_gloss", columns={"glossid"}), @ORM\Index(name="FK_glossaryimages_uid_idx", columns={"uid"})})
 * @ORM\Entity
 */
class Glossaryimages
{
    /**
     * @var int
     *
     * @ORM\Column(name="glimgid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $glimgid;

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
     * @ORM\Column(name="structures", type="string", length=150, precision=0, scale=0, nullable=true, unique=false)
     */
    private $structures;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var string|null
     *
     * @ORM\Column(name="createdBy", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $createdby;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\Glossary
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Glossary")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="glossid", referencedColumnName="glossid", nullable=true)
     * })
     */
    private $glossid;

    /**
     * @var \App\Entities\User
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uid", referencedColumnName="uid", nullable=true)
     * })
     */
    private $uid;


    /**
     * Get glimgid.
     *
     * @return int
     */
    public function getGlimgid()
    {
        return $this->glimgid;
    }

    /**
     * Set url.
     *
     * @param string $url
     *
     * @return Glossaryimages
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
     * @return Glossaryimages
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
     * Set structures.
     *
     * @param string|null $structures
     *
     * @return Glossaryimages
     */
    public function setStructures($structures = null)
    {
        $this->structures = $structures;

        return $this;
    }

    /**
     * Get structures.
     *
     * @return string|null
     */
    public function getStructures()
    {
        return $this->structures;
    }

    /**
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Glossaryimages
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
     * Set createdby.
     *
     * @param string|null $createdby
     *
     * @return Glossaryimages
     */
    public function setCreatedby($createdby = null)
    {
        $this->createdby = $createdby;

        return $this;
    }

    /**
     * Get createdby.
     *
     * @return string|null
     */
    public function getCreatedby()
    {
        return $this->createdby;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Glossaryimages
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

    /**
     * Set glossid.
     *
     * @param \App\Entities\Glossary|null $glossid
     *
     * @return Glossaryimages
     */
    public function setGlossid(\App\Entities\Glossary $glossid = null)
    {
        $this->glossid = $glossid;

        return $this;
    }

    /**
     * Get glossid.
     *
     * @return \App\Entities\Glossary|null
     */
    public function getGlossid()
    {
        return $this->glossid;
    }

    /**
     * Set uid.
     *
     * @param \App\Entities\User|null $uid
     *
     * @return Glossaryimages
     */
    public function setUid(\App\Entities\User $uid = null)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid.
     *
     * @return \App\Entities\User|null
     */
    public function getUid()
    {
        return $this->uid;
    }
}
