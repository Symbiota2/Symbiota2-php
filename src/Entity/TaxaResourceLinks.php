<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TaxaResourceLinks
 *
 * @ORM\Table(name="taxaresourcelinks", indexes={@ORM\Index(name="FK_taxaresource_tid_idx", columns={"tid"}), @ORM\Index(name="taxaresource_name", columns={"sourcename"})})
 * @ORM\Entity(repositoryClass="App\Repository\TaxaResourceLinksRepository")
 */
class TaxaResourceLinks
{
    /**
     * @var int
     *
     * @ORM\Column(name="taxaresourceid", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $taxaresourceid;

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
     * @ORM\Column(name="sourcename", type="string", length=150, nullable=false)
     */
    private $sourcename;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sourceidentifier", type="string", length=45, nullable=true, options={"default"=NULL})
     */
    private $sourceidentifier = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="sourceguid", type="string", length=150, nullable=true, options={"default"=NULL})
     */
    private $sourceguid = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $url = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="ranking", type="integer", nullable=true, options={"default"=NULL})
     */
    private $ranking = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getTaxaresourceid(): ?int
    {
        return $this->taxaresourceid;
    }

    public function getSourcename(): ?string
    {
        return $this->sourcename;
    }

    public function setSourcename(string $sourcename): self
    {
        $this->sourcename = $sourcename;

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

    public function getSourceguid(): ?string
    {
        return $this->sourceguid;
    }

    public function setSourceguid(?string $sourceguid): self
    {
        $this->sourceguid = $sourceguid;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
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

    public function getRanking(): ?int
    {
        return $this->ranking;
    }

    public function setRanking(?int $ranking): self
    {
        $this->ranking = $ranking;

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
