<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taxaenumtree
 *
 * @ORM\Table(name="taxaenumtree", indexes={@ORM\Index(name="FK_tet_taxa", columns={"tid"}), @ORM\Index(name="FK_tet_taxa2", columns={"parenttid"}), @ORM\Index(name="FK_tet_taxauth", columns={"taxauthid"})})
 * @ORM\Entity(repositoryClass="App\Repository\TaxaenumtreeRepository")
 */
class Taxaenumtree
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Taxauthority
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Taxauthority")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="taxauthid", referencedColumnName="taxauthid")
     * })
     */
    private $taxauthid;

    /**
     * @var \Taxa
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parenttid", referencedColumnName="TID")
     * })
     */
    private $parenttid;

    /**
     * @var \Taxa
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     * })
     */
    private $tid;

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    public function getTaxauthid(): ?Taxauthority
    {
        return $this->taxauthid;
    }

    public function setTaxauthid(?Taxauthority $taxauthid): self
    {
        $this->taxauthid = $taxauthid;

        return $this;
    }

    public function getParenttid(): ?Taxa
    {
        return $this->parenttid;
    }

    public function setParenttid(?Taxa $parenttid): self
    {
        $this->parenttid = $parenttid;

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
