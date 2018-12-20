<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Imagetag
 *
 * @ORM\Table(name="imagetag", uniqueConstraints={@ORM\UniqueConstraint(name="imgid", columns={"imgid", "keyvalue"})}, indexes={@ORM\Index(name="keyvalue", columns={"keyvalue"}), @ORM\Index(name="FK_imagetag_imgid_idx", columns={"imgid"})})
 * @ORM\Entity(repositoryClass="App\Repository\ImagetagRepository")
 */
class Imagetag
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
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $initialtimestamp = 'current_timestamp()';

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
     * @var \Imagetagkey
     *
     * @ORM\ManyToOne(targetEntity="Imagetagkey")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="keyvalue", referencedColumnName="tagkey")
     * })
     */
    private $keyvalue;

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

    public function getKeyvalue(): ?Imagetagkey
    {
        return $this->keyvalue;
    }

    public function setKeyvalue(?Imagetagkey $keyvalue): self
    {
        $this->keyvalue = $keyvalue;

        return $this;
    }


}
