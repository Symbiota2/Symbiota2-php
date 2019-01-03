<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Imagetagkey
 *
 * @ORM\Table(name="imagetagkey", indexes={@ORM\Index(name="sortorder", columns={"sortorder"})})
 * @ORM\Entity(repositoryClass="App\Repository\ImagetagkeyRepository")
 */
class Imagetagkey
{
    /**
     * @var string
     *
     * @ORM\Column(name="tagkey", type="string", length=30, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tagkey;

    /**
     * @var string
     *
     * @ORM\Column(name="shortlabel", type="string", length=30, nullable=false)
     */
    private $shortlabel;

    /**
     * @var string
     *
     * @ORM\Column(name="description_en", type="string", length=255, nullable=false)
     */
    private $descriptionEn;

    /**
     * @var int
     *
     * @ORM\Column(name="sortorder", type="integer", nullable=false)
     */
    private $sortorder;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getTagkey(): ?string
    {
        return $this->tagkey;
    }

    public function getShortlabel(): ?string
    {
        return $this->shortlabel;
    }

    public function setShortlabel(string $shortlabel): self
    {
        $this->shortlabel = $shortlabel;

        return $this;
    }

    public function getDescriptionEn(): ?string
    {
        return $this->descriptionEn;
    }

    public function setDescriptionEn(string $descriptionEn): self
    {
        $this->descriptionEn = $descriptionEn;

        return $this;
    }

    public function getSortorder(): ?int
    {
        return $this->sortorder;
    }

    public function setSortorder(int $sortorder): self
    {
        $this->sortorder = $sortorder;

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
