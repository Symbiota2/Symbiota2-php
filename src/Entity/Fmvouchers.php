<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fmvouchers
 *
 * @ORM\Table(name="fmvouchers", indexes={@ORM\Index(name="chklst_taxavouchers", columns={"TID", "CLID"}), @ORM\Index(name="IDX_6468A29340A24FBA", columns={"occid"})})
 * @ORM\Entity(repositoryClass="App\Repository\FmvouchersRepository")
 */
class Fmvouchers
{
    /**
     * @var int|null
     *
     * @ORM\Column(name="TID", type="integer", nullable=true, options={"default"=NULL,"unsigned"=true})
     */
    private $tid = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="CLID", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $clid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="editornotes", type="string", length=50, nullable=true, options={"default"=NULL})
     */
    private $editornotes = 'NULL';

    /**
     * @var int|null
     *
     * @ORM\Column(name="preferredImage", type="integer", nullable=true, options={"default"=NULL})
     */
    private $preferredimage = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="Notes", type="string", length=250, nullable=true, options={"default"=NULL})
     */
    private $notes = 'NULL';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="InitialTimeStamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $initialtimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \Omoccurrences
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Omoccurrences")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="occid", referencedColumnName="occid")
     * })
     */
    private $occid;

    public function getTid(): ?int
    {
        return $this->tid;
    }

    public function setTid(?int $tid): self
    {
        $this->tid = $tid;

        return $this;
    }

    public function getClid(): ?int
    {
        return $this->clid;
    }

    public function getEditornotes(): ?string
    {
        return $this->editornotes;
    }

    public function setEditornotes(?string $editornotes): self
    {
        $this->editornotes = $editornotes;

        return $this;
    }

    public function getPreferredimage(): ?int
    {
        return $this->preferredimage;
    }

    public function setPreferredimage(?int $preferredimage): self
    {
        $this->preferredimage = $preferredimage;

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

    public function getInitialtimestamp(): ?\DateTimeInterface
    {
        return $this->initialtimestamp;
    }

    public function setInitialtimestamp(\DateTimeInterface $initialtimestamp): self
    {
        $this->initialtimestamp = $initialtimestamp;

        return $this;
    }

    public function getOccid(): ?Omoccurrences
    {
        return $this->occid;
    }

    public function setOccid(?Omoccurrences $occid): self
    {
        $this->occid = $occid;

        return $this;
    }


}
