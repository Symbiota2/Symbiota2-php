<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kmcsimages
 *
 * @ORM\Table(name="kmcsimages", indexes={@ORM\Index(name="FK_kscsimages_kscs_idx", columns={"cid", "cs"})})
 * @ORM\Entity(repositoryClass="App\Repository\KmcsimagesRepository")
 */
class Kmcsimages
{
    /**
     * @var int
     *
     * @ORM\Column(name="csimgid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $csimgid;

    /**
     * @var int
     *
     * @ORM\Column(name="cid", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $cid;

    /**
     * @var string
     *
     * @ORM\Column(name="cs", type="string", length=16, nullable=false)
     */
    private $cs;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="sortsequence", type="string", length=45, nullable=false, options={"default"="50"})
     */
    private $sortsequence = '50';

    /**
     * @var string|null
     *
     * @ORM\Column(name="username", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $username = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getCsimgid(): ?int
    {
        return $this->csimgid;
    }

    public function getCid(): ?int
    {
        return $this->cid;
    }

    public function setCid(int $cid): self
    {
        $this->cid = $cid;

        return $this;
    }

    public function getCs(): ?string
    {
        return $this->cs;
    }

    public function setCs(string $cs): self
    {
        $this->cs = $cs;

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

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getSortsequence(): ?string
    {
        return $this->sortsequence;
    }

    public function setSortsequence(string $sortsequence): self
    {
        $this->sortsequence = $sortsequence;

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
