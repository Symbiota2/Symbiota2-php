<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImageTag
 *
 * @ORM\Table(name="imagetag", uniqueConstraints={@ORM\UniqueConstraint(name="imgid", columns={"imgid", "keyvalue"})}, indexes={@ORM\Index(name="keyvalue", columns={"keyvalue"}), @ORM\Index(name="FK_imagetag_imgid_idx", columns={"imgid"})})
 * @ORM\Entity(repositoryClass="App\Repository\ImageTagRepository")
 */
class ImageTag
{
    /**
     * @var int
     *
     * @ORM\Column(name="imagetagid", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $imagetagid;

    /**
     * @var \Images
     *
     * @ORM\ManyToOne(targetEntity="Images")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="imgid", referencedColumnName="imgid")
     * })
     */
    private $imgid;

    /**
     * @var \ImageTagKey
     *
     * @ORM\ManyToOne(targetEntity="ImageTagKey")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="keyvalue", referencedColumnName="tagkey")
     * })
     */
    private $keyvalue;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getImagetagid(): ?int
    {
        return $this->imagetagid;
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

    public function getImgid(): ?Images
    {
        return $this->imgid;
    }

    public function setImgid(?Images $imgid): self
    {
        $this->imgid = $imgid;

        return $this;
    }

    public function getKeyvalue(): ?ImageTagKey
    {
        return $this->keyvalue;
    }

    public function setKeyvalue(?ImageTagKey $keyvalue): self
    {
        $this->keyvalue = $keyvalue;

        return $this;
    }


}
