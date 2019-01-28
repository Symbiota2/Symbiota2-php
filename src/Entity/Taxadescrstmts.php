<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taxadescrstmts
 *
 * @ORM\Table(name="taxadescrstmts", indexes={@ORM\Index(name="FK_taxadescrstmts_tblock", columns={"tdbid"})})
 * @ORM\Entity(repositoryClass="App\Repository\TaxadescrstmtsRepository")
 */
class Taxadescrstmts
{
    /**
     * @var int
     *
     * @ORM\Column(name="tdsid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tdsid;

    /**
     * @var \Taxadescrblock
     *
     * @ORM\ManyToOne(targetEntity="Taxadescrblock")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tdbid", referencedColumnName="tdbid")
     * })
     */
    private $tdbid;

    /**
     * @var string
     *
     * @ORM\Column(name="heading", type="string", length=75, nullable=false)
     */
    private $heading;

    /**
     * @var string
     *
     * @ORM\Column(name="statement", type="text", length=65535, nullable=false)
     */
    private $statement;

    /**
     * @var int
     *
     * @ORM\Column(name="displayheader", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $displayheader = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="sortsequence", type="integer", nullable=false, options={"default"="89","unsigned"=true})
     */
    private $sortsequence = '89';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    public function getTdsid(): ?int
    {
        return $this->tdsid;
    }

    public function getHeading(): ?string
    {
        return $this->heading;
    }

    public function setHeading(string $heading): self
    {
        $this->heading = $heading;

        return $this;
    }

    public function getStatement(): ?string
    {
        return $this->statement;
    }

    public function setStatement(string $statement): self
    {
        $this->statement = $statement;

        return $this;
    }

    public function getDisplayheader(): ?int
    {
        return $this->displayheader;
    }

    public function setDisplayheader(int $displayheader): self
    {
        $this->displayheader = $displayheader;

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

    public function getTdbid(): ?Taxadescrblock
    {
        return $this->tdbid;
    }

    public function setTdbid(?Taxadescrblock $tdbid): self
    {
        $this->tdbid = $tdbid;

        return $this;
    }


}
