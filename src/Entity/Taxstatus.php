<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Taxstatus
 *
 * @ORM\Table(name="taxstatus", indexes={@ORM\Index(name="Index_ts_taid", columns={"taxauthid"}), @ORM\Index(name="Index_ts_tidacc", columns={"tidaccepted"}), @ORM\Index(name="Index_ts_tid", columns={"tid"}), @ORM\Index(name="Index_ts_family", columns={"family"}), @ORM\Index(name="Index_ts_parenttid", columns={"parenttid"})})
 * @ORM\Entity(repositoryClass="App\Repository\TaxstatusRepository")
 */
class Taxstatus
{
    /**
     * @var int
     *
     * @ORM\Column(name="tsid", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tsid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="hierarchystr", type="string", length=200, nullable=true, options={"default"=NULL})
     */
    private $hierarchystr = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="family", type="string", length=50, nullable=true, options={"default"=NULL})
     */
    private $family = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="UnacceptabilityReason", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $unacceptabilityreason = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="SortSequence", type="integer", nullable=true, options={"default"="50","unsigned"=true})
     */
    private $sortsequence = '50';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="initialtimestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Taxa
     *
     * @ORM\ManyToOne(targetEntity="Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tidaccepted", referencedColumnName="TID")
     * })
     */
    private $tidaccepted;

    /**
     * @var \Taxauthority
     *
     * @ORM\ManyToOne(targetEntity="Taxauthority")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="taxauthid", referencedColumnName="taxauthid")
     * })
     */
    private $taxauthid;

    /**
     * @var \Taxa
     *
     * @ORM\ManyToOne(targetEntity="Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parenttid", referencedColumnName="TID")
     * })
     */
    private $parenttid;

    /**
     * @var \Taxa
     *
     * @ORM\ManyToOne(targetEntity="Taxa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tid", referencedColumnName="TID")
     * })
     */
    private $tid;

    public function getTsid(): ?int
    {
        return $this->tsid;
    }

    public function getHierarchystr(): ?string
    {
        return $this->hierarchystr;
    }

    public function setHierarchystr(?string $hierarchystr): self
    {
        $this->hierarchystr = $hierarchystr;

        return $this;
    }

    public function getFamily(): ?string
    {
        return $this->family;
    }

    public function setFamily(?string $family): self
    {
        $this->family = $family;

        return $this;
    }

    public function getUnacceptabilityreason(): ?string
    {
        return $this->unacceptabilityreason;
    }

    public function setUnacceptabilityreason(?string $unacceptabilityreason): self
    {
        $this->unacceptabilityreason = $unacceptabilityreason;

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

    public function setSortsequence(?int $sortsequence): self
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

    public function getTidaccepted(): ?Taxa
    {
        return $this->tidaccepted;
    }

    public function setTidaccepted(?Taxa $tidaccepted): self
    {
        $this->tidaccepted = $tidaccepted;

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
