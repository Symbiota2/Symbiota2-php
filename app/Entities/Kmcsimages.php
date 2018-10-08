<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kmcsimages
 *
 * @ORM\Table(name="kmcsimages", indexes={@ORM\Index(name="FK_kscsimages_kscs_idx", columns={"cid", "cs"})})
 * @ORM\Entity
 */
class Kmcsimages
{
    /**
     * @var int
     *
     * @ORM\Column(name="csimgid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $csimgid;

    /**
     * @var int
     *
     * @ORM\Column(name="cid", type="integer", precision=0, scale=0, nullable=false, options={"unsigned"=true}, unique=false)
     */
    private $cid;

    /**
     * @var string
     *
     * @ORM\Column(name="cs", type="string", length=16, precision=0, scale=0, nullable=false, unique=false)
     */
    private $cs;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, precision=0, scale=0, nullable=true, unique=false)
     */
    private $notes;

    /**
     * @var string
     *
     * @ORM\Column(name="sortsequence", type="string", length=45, precision=0, scale=0, nullable=false, options={"default"="50"}, unique=false)
     */
    private $sortsequence = '50';

    /**
     * @var string|null
     *
     * @ORM\Column(name="username", type="string", length=45, precision=0, scale=0, nullable=true, unique=false)
     */
    private $username;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';


    /**
     * Get csimgid.
     *
     * @return int
     */
    public function getCsimgid()
    {
        return $this->csimgid;
    }

    /**
     * Set cid.
     *
     * @param int $cid
     *
     * @return Kmcsimages
     */
    public function setCid($cid)
    {
        $this->cid = $cid;

        return $this;
    }

    /**
     * Get cid.
     *
     * @return int
     */
    public function getCid()
    {
        return $this->cid;
    }

    /**
     * Set cs.
     *
     * @param string $cs
     *
     * @return Kmcsimages
     */
    public function setCs($cs)
    {
        $this->cs = $cs;

        return $this;
    }

    /**
     * Get cs.
     *
     * @return string
     */
    public function getCs()
    {
        return $this->cs;
    }

    /**
     * Set url.
     *
     * @param string $url
     *
     * @return Kmcsimages
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
     * Set notes.
     *
     * @param string|null $notes
     *
     * @return Kmcsimages
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
     * Set sortsequence.
     *
     * @param string $sortsequence
     *
     * @return Kmcsimages
     */
    public function setSortsequence($sortsequence)
    {
        $this->sortsequence = $sortsequence;

        return $this;
    }

    /**
     * Get sortsequence.
     *
     * @return string
     */
    public function getSortsequence()
    {
        return $this->sortsequence;
    }

    /**
     * Set username.
     *
     * @param string|null $username
     *
     * @return Kmcsimages
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
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Kmcsimages
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
