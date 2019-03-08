<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TaxaLinks
 *
 * @ORM\Table(name="taxalinks", indexes={@ORM\Index(name="Index_unique_taxalinks", columns={"tid", "url"})})
 * @ORM\Entity(repositoryClass="App\Repository\TaxaLinksRepository")
 */
class TaxaLinks
{
    /**
     * @var int
     *
     * @ORM\Column(name="tlid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tlid;

    /**
     * @var \Taxa
     *
     * @ORM\ManyToOne(targetEntity="Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     * })
     */
    private $tid;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=500, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sourceIdentifier", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $sourceidentifier = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="owner", type="string", length=100, nullable=true, options={"default"=NULL})
     */
    private $owner = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="icon", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $icon = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="inherit", type="integer", nullable=true, options={"default"="1"})
     */
    private $inherit = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="sortsequence", type="integer", nullable=false, options={"default"="50","unsigned"=true})
     */
    private $sortsequence = '50';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getTlid(): ?int
    {
        return $this->tlid;
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSourceidentifier(): ?string
    {
        return $this->sourceidentifier;
    }

    public function setSourceidentifier(?string $sourceidentifier): self
    {
        $this->sourceidentifier = $sourceidentifier;

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

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getInherit(): ?int
    {
        return $this->inherit;
    }

    public function setInherit(?int $inherit): self
    {
        $this->inherit = $inherit;

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

    public function getSortsequence(): ?int
    {
        return $this->sortsequence;
    }

    public function setSortsequence(int $sortsequence): self
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

    public function getTid(): ?Taxa
    {
        return $this->tid;
    }

    public function setTid(?Taxa $tid): self
    {
        $this->tid = $tid;

        return $this;
    }


}
