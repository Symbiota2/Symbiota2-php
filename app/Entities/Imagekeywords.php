<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Imagekeywords
 *
 * @ORM\Table(name="imagekeywords", indexes={@ORM\Index(name="FK_imagekeywords_imgid_idx", columns={"imgid"}), @ORM\Index(name="FK_imagekeyword_uid_idx", columns={"uidassignedby"}), @ORM\Index(name="INDEX_imagekeyword", columns={"keyword"})})
 * @ORM\Entity
 */
class Imagekeywords
{
    /**
     * @var int
     *
     * @ORM\Column(name="imgkeywordid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $imgkeywordid;

    /**
     * @var string
     *
     * @ORM\Column(name="keyword", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $keyword;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=true, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \App\Entities\User
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uidassignedby", referencedColumnName="uid", nullable=true)
     * })
     */
    private $uidassignedby;

    /**
     * @var \App\Entities\Images
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Images")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="imgid", referencedColumnName="imgid", nullable=true)
     * })
     */
    private $imgid;


    /**
     * Get imgkeywordid.
     *
     * @return int
     */
    public function getImgkeywordid()
    {
        return $this->imgkeywordid;
    }

    /**
     * Set keyword.
     *
     * @param string $keyword
     *
     * @return Imagekeywords
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;

        return $this;
    }

    /**
     * Get keyword.
     *
     * @return string
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime|null $initialtimestamp
     *
     * @return Imagekeywords
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
     * Set uidassignedby.
     *
     * @param \App\Entities\User|null $uidassignedby
     *
     * @return Imagekeywords
     */
    public function setUidassignedby(\App\Entities\User $uidassignedby = null)
    {
        $this->uidassignedby = $uidassignedby;

        return $this;
    }

    /**
     * Get uidassignedby.
     *
     * @return \App\Entities\User|null
     */
    public function getUidassignedby()
    {
        return $this->uidassignedby;
    }

    /**
     * Set imgid.
     *
     * @param \App\Entities\Images|null $imgid
     *
     * @return Imagekeywords
     */
    public function setImgid(\App\Entities\Images $imgid = null)
    {
        $this->imgid = $imgid;

        return $this;
    }

    /**
     * Get imgid.
     *
     * @return \App\Entities\Images|null
     */
    public function getImgid()
    {
        return $this->imgid;
    }
}
