<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Imagetag
 *
 * @ORM\Table(name="imagetag", uniqueConstraints={@ORM\UniqueConstraint(name="imgid", columns={"imgid", "keyvalue"})}, indexes={@ORM\Index(name="keyvalue", columns={"keyvalue"}), @ORM\Index(name="FK_imagetag_imgid_idx", columns={"imgid"})})
 * @ORM\Entity
 */
class Imagetag
{
    /**
     * @var int
     *
     * @ORM\Column(name="imagetagid", type="bigint", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $imagetagid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

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
     * @var \App\Entities\Imagetagkey
     *
     * @ORM\ManyToOne(targetEntity="App\Entities\Imagetagkey")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="keyvalue", referencedColumnName="tagkey", nullable=true)
     * })
     */
    private $keyvalue;


    /**
     * Get imagetagid.
     *
     * @return int
     */
    public function getImagetagid()
    {
        return $this->imagetagid;
    }

    /**
     * Set initialtimestamp.
     *
     * @param \DateTime $initialtimestamp
     *
     * @return Imagetag
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
     * Set imgid.
     *
     * @param \App\Entities\Images|null $imgid
     *
     * @return Imagetag
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

    /**
     * Set keyvalue.
     *
     * @param \App\Entities\Imagetagkey|null $keyvalue
     *
     * @return Imagetag
     */
    public function setKeyvalue(\App\Entities\Imagetagkey $keyvalue = null)
    {
        $this->keyvalue = $keyvalue;

        return $this;
    }

    /**
     * Get keyvalue.
     *
     * @return \App\Entities\Imagetagkey|null
     */
    public function getKeyvalue()
    {
        return $this->keyvalue;
    }
}
