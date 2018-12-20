<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Imagekeywords
 *
 * @ORM\Table(name="imagekeywords", indexes={@ORM\Index(name="FK_imagekeyword_uid_idx", columns={"uidassignedby"}), @ORM\Index(name="FK_imagekeywords_imgid_idx", columns={"imgid"}), @ORM\Index(name="INDEX_imagekeyword", columns={"keyword"})})
 * @ORM\Entity(repositoryClass="App\Repository\ImagekeywordsRepository")
 */
class Imagekeywords
{
    /**
     * @var int
     *
     * @ORM\Column(name="imgkeywordid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $imgkeywordid;

    /**
     * @var string
     *
     * @ORM\Column(name="keyword", type="string", length=45, nullable=false)
     */
    private $keyword;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=true, options={"default"="current_timestamp()"})
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
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="uidassignedby", referencedColumnName="uid")
     * })
     */
    private $uidassignedby;

    public function getImgkeywordid(): ?int
    {
        return $this->imgkeywordid;
    }

    public function getKeyword(): ?string
    {
        return $this->keyword;
    }

    public function setKeyword(string $keyword): self
    {
        $this->keyword = $keyword;

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

    public function getImgid(): ?Images
    {
        return $this->imgid;
    }

    public function setImgid(?Images $imgid): self
    {
        $this->imgid = $imgid;

        return $this;
    }

    public function getUidassignedby(): ?Users
    {
        return $this->uidassignedby;
    }

    public function setUidassignedby(?Users $uidassignedby): self
    {
        $this->uidassignedby = $uidassignedby;

        return $this;
    }


}
